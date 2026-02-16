<?php

namespace DedexBundle\Tests\Controller;

use DedexBundle\Controller\ErnParserController;
use DedexBundle\Simplifiers\SimpleAlbum;
use DedexBundle\Simplifiers\SimpleTrack;
use PHPUnit\Framework\TestCase;

class SimplifiersTest extends TestCase {

  public function testSimpleAlbum() {
    $parser = new ErnParserController();
    $ern = $parser->parse("tests/samples/with_assets/004_complete/1199119911991.xml");

    $album = new SimpleAlbum($ern);

    // Album
    $this->assertEquals("Album Title", $album->getTitle());
    $this->assertCount(1, $album->getArtists());
    $this->assertEquals("Artist 1", $album->getArtists()[0]->getName());
    $this->assertEquals("MainArtist", $album->getArtists()[0]->getRole());
    $this->assertEquals("NotExplicit", $album->getParentalWarningType());
    $this->assertEquals(2013, $album->getPLineYear());
    $this->assertEquals("2013 Label 1", $album->getPLineText());
    $this->assertEquals(2013, $album->getCLineYear());
    $this->assertEquals("2013 Label 1", $album->getCLineText());

    // Album deal
    $this->assertContains("PayAsYouGoModel", $album->getDeal()->getCommercialModelTypes());
    $this->assertContains("AdvertisementSupportedModel", $album->getDeal()->getCommercialModelTypes());
    $this->assertContains("SubscriptionModel", $album->getDeal()->getCommercialModelTypes());
    $this->assertContains("PermanentDownload", $album->getDeal()->getUseTypes());
    $this->assertContains("OnDemandStream", $album->getDeal()->getUseTypes());
    $this->assertContains("NonInteractiveStream", $album->getDeal()->getUseTypes());
    $this->assertContains("InternetAndMobile", $album->getDeal()->getDistributionChannelTypes());
    $this->assertStringContainsString("Worldwide", $album->getDeal()->getTerritories()[0]->value());
    $this->assertEquals("2017-01-01", $album->getDeal()->getStartDate()->format("Y-m-d"));
    $this->assertEquals(null, $album->getDeal()->getEndDate());

    // Image
    $this->assertEquals("1199119911991_FrontCoverImage.jpg", $album->getImageFrontCover()->getFileName());
    $this->assertEquals("assets/1199119911991_FrontCoverImage.jpg", $album->getImageFrontCover()->getFullPath());
    $this->assertEquals("AABBCCDDEEFF11223344556677889900", $album->getImageFrontCover()->getHashSum());
    $this->assertEquals("MD5", $album->getImageFrontCover()->getHashSumAlgorithm());

    // Tracks
    $tracks = $album->getTracksPerCd();
    $this->assertCount(1, $tracks);
    $this->assertCount(9, $tracks[1]);
    $this->assertEquals("1199119911991_001.flac", $tracks[1][1]->getFileName());
    $this->assertEquals("assets/1199119911991_001.flac", $tracks[1][1]->getFullPath());
    $this->assertEquals("1199119911991_002.flac", $tracks[1][2]->getFileName());
    $this->assertEquals("1199119911991_003.flac", $tracks[1][3]->getFileName());
    $this->assertEquals("1199119911991_004.flac", $tracks[1][4]->getFileName());
    $this->assertEquals("1199119911991_005.flac", $tracks[1][5]->getFileName());
    $this->assertEquals("1199119911991_006.flac", $tracks[1][6]->getFileName());
    $this->assertEquals("1199119911991_007.flac", $tracks[1][7]->getFileName());
    $this->assertEquals("1199119911991_008.flac", $tracks[1][8]->getFileName());
    $this->assertEquals("1199119911991_009.flac", $tracks[1][9]->getFileName());

    /* @var $track SimpleTrack */
    $track = $tracks[1][1];
    $this->assertEquals("BE0000000001", $track->getIsrc());
    $this->assertEquals("Track Title 1", $track->getTitle());
    $this->assertEquals("PT0H8M7S", $track->getDurationIso());
    $this->assertEquals(487, $track->getDurationInSeconds());
    $this->assertEquals("AABBCCDDEEFF11223344556677889900", $track->getHashSum());
    $this->assertEquals("MD5", $track->getHashSumAlgorithm());

    // Artists
    $this->assertCount(3, $track->getArtists());
    $this->assertEquals("Artist 1", $track->getArtists()[0]->getName());
    $this->assertEquals("MainArtist", $track->getArtists()[0]->getRole());
    $this->assertEquals("Artist 2", $track->getArtists()[1]->getName());
    $this->assertEquals("Conductor", $track->getArtists()[1]->getRole());
    $this->assertEquals("Composer 1", $track->getArtists()[2]->getName());
    $this->assertEquals("Composer", $track->getArtists()[2]->getRole());

    $this->assertEquals("Label 1", $track->getLabelName());
    $this->assertEquals(2013, $track->getPLineYear());
    $this->assertEquals("2013 Label 1", $track->getPLineText());
    $this->assertEquals("Classical", $track->getGenre());
    $this->assertEquals(null, $track->getSubGenre());
    $this->assertEquals("NotExplicit", $track->getParentalWarningType());

    // Track deal
    $this->assertContains("PayAsYouGoModel", $track->getDeal()->getCommercialModelTypes());
  }
  
  public function testResourcePath() {
    $parser = new ErnParserController();
    $ern = $parser->parse("tests/samples/016_utf8_artists.xml");

    $album = new SimpleAlbum($ern);
    $this->assertEquals("resources/763331950658_01_01.mp3", $album->getTracksPerCd()[1][1]->getFullPath());
  }
	
	/**
	 * Test the tag PurgedRelease
	 */
	public function testSample017PurgedAlbum() {
		$xml_path = "tests/samples/017_purged_release.xml";
    $parser_controller = new ErnParserController();
    // Set this to true to see logs from the parser
    $parser_controller->setDisplayLog(false);
    /* @var $ddex NewReleaseMessage */
    $ddex = $parser_controller->parse($xml_path);

		$album = new SimpleAlbum($ddex);
		$this->assertTrue($album->isTakedown());
		$this->assertTrue($album->isPurge());
	}

  /**
   * Test SimpleAlbum with ERN 4.3 data
   */
  public function testSimpleAlbumErn43() {
    $parser = new ErnParserController();
    $ern = $parser->parse("tests/samples/018_ern43.xml");

    $album = new SimpleAlbum($ern);

    // Album title
    $this->assertEquals("Test Album ERN43", $album->getTitle());

    // ICPN
    $this->assertEquals("1234567890123", $album->getIcpn());

    // PLine
    $this->assertEquals(2024, $album->getPLineYear());
    $this->assertEquals("(P) 2024 Test Label", $album->getPLineText());

    // CLine
    $this->assertEquals(2024, $album->getCLineYear());
    $this->assertEquals("(C) 2024 Test Label", $album->getCLineText());

    // Artists (from DisplayArtistName fallback in 4.x)
    $artists = $album->getArtists();
    $this->assertNotEmpty($artists);
    $this->assertEquals("Test Artist", $artists[0]->getName());

    // Genre
    $this->assertEquals("Pop", $album->getGenre());

    // Parental warning
    $this->assertEquals("NotExplicit", $album->getParentalWarningType());

    // Deal
    $deal = $album->getDeal();
    $this->assertNotNull($deal);
    $this->assertContains("SubscriptionModel", $deal->getCommercialModelTypes());
    $this->assertContains("OnDemandStream", $deal->getUseTypes());

    // Image front cover
    $image = $album->getImageFrontCover();
    $this->assertNotNull($image);
    $this->assertEquals("test_cover.jpg", $image->getFileName());

    // Tracks
    $tracks = $album->getTracksPerCd();
    $this->assertCount(1, $tracks); // 1 CD
    $this->assertCount(2, $tracks[1]); // 2 tracks on CD 1

    // Track 1
    $track1 = $tracks[1][1];
    $this->assertEquals("Track One", $track1->getTitle());
    $this->assertEquals("TEST00000001", $track1->getIsrc());
    $this->assertEquals("track_001.wav", $track1->getFileName());

    // Track 2
    $track2 = $tracks[1][2];
    $this->assertEquals("Track Two", $track2->getTitle());
    $this->assertEquals("TEST00000002", $track2->getIsrc());
    $this->assertEquals("track_002.wav", $track2->getFileName());
  }
}
