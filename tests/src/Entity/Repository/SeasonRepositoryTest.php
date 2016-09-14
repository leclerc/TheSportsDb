<?php

namespace TheSportsDb\Entity\Repository;

use TheSportsDb\Entity\SeasonInterface;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-14 at 08:53:39.
 */
class SeasonRepositoryTest extends \PHPUnit_Framework_TestCase {

  /**
   * @var \TheSportsDb\Entity\Repository\SeasonRepository
   */
  protected $seasonRepository;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    include __DIR__ . '/../../../../default_bootstrap.php';
    $this->seasonRepository = isset($container) ? $container->get('thesportsdb.repository.season') : $repositoryContainer->getRepository('season');
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {
    $this->seasonRepository = NULL;
  }

  /**
   * @covers TheSportsDb\Entity\Repository\SeasonRepository::byId
   */
  public function testById() {
    $season = $this->seasonRepository->byId('1415|4328');
     // Should be a season.
    $this->assertInstanceOf(SeasonInterface::class, $season);
    $this->assertEquals('1415', $season->getName());

    // Try a fake season.
    $season = $this->seasonRepository->byId('FakeSeason|FakeLeague123');
    // Should be a season.
    $this->assertInstanceOf(SeasonInterface::class, $season);
    $this->assertEquals('FakeSeason', $season->getName());

    // Season doesn't exist, so exception when we try to load its leagues.
    $this->expectException(\Exception::class);
    $this->expectExceptionMessage('Could not fully load season with id FakeSeason|FakeLeague123.');
    $season->getEvents();
  }

  /**
   * @covers TheSportsDb\Entity\Repository\SeasonRepository::all
   */
  public function testAll() {
    // We do not support loading all seasons, too much data.
    $this->assertEmpty($this->seasonRepository->all());
  }

  /**
   * @covers TheSportsDb\Entity\Repository\SeasonRepository::byLeague
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeArray
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeEntity
   */
  public function testByLeague() {
    $seasons = $this->seasonRepository->byLeague(4328);
    $this->assertNotEmpty($seasons);

    foreach ($seasons as $season) {
      // Should be an season.
      $this->assertInstanceOf(SeasonInterface::class, $season);
      $this->assertEquals(4328, $season->getLeague()->getId());
    }

    // Try a fake league.
    $seasons = $this->seasonRepository->byLeague('FakeLeague123');
    $this->assertEmpty($seasons);
  }

}