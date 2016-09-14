<?php

namespace TheSportsDb\Test\Entity\Repository;

use TheSportsDb\Entity\LeagueInterface;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-14 at 09:44:08.
 */
class LeagueRepositoryTest extends \PHPUnit_Framework_TestCase {

  /**
   * @var \TheSportsDb\Entity\Repository\LeagueRepository
   */
  protected $leagueRepository;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp() {
    include __DIR__ . '/../../../../default_bootstrap.php';
    $this->leagueRepository = isset($container) ? $container->get('thesportsdb.repository.league') : $repositoryContainer->getRepository('league');
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown() {
    $this->leagueRepository = NULL;
  }

  /**
   * @covers TheSportsDb\Entity\Repository\LeagueRepository::all
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeArray
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeEntity
   */
  public function testAll() {
    $leagues = $this->leagueRepository->all();
    $this->assertNotEmpty($leagues);
    foreach ($leagues as $league) {
      // Should be a league.
      $this->assertInstanceOf(LeagueInterface::class, $league);
    }
  }

  /**
   * @covers TheSportsDb\Entity\Repository\LeagueRepository::byCountry
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeArray
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeEntity
   */
  public function testByCountry() {
    $leagues = $this->leagueRepository->byCountry('Belgium');
    $this->assertNotEmpty($leagues);
    foreach ($leagues as $league) {
      // Should be a league.
      $this->assertInstanceOf(LeagueInterface::class, $league);
      $this->assertEquals('Belgium', $league->getCountry());
    }

    // Try a fake country.
    $leagues = $this->leagueRepository->byCountry('FakeCountry123');
    $this->assertEmpty($leagues);
  }

  /**
   * @covers TheSportsDb\Entity\Repository\LeagueRepository::byCountryAndSport
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeArray
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeEntity
   */
  public function testByCountryAndSport() {
    $leagues = $this->leagueRepository->byCountryAndSport('Belgium', 'Soccer');
    $this->assertNotEmpty($leagues);
    foreach ($leagues as $league) {
      // Should be a league.
      $this->assertInstanceOf(LeagueInterface::class, $league);
      $this->assertEquals('Belgium', $league->getCountry());
      $this->assertEquals('Soccer', $league->getSport()->getName());
    }

    // Try a fake country.
    $leagues = $this->leagueRepository->byCountryAndSport('FakeCountry123', 'Soccer');
    $this->assertEmpty($leagues);

    // Try a fake sport.
    $leagues = $this->leagueRepository->byCountryAndSport('Belgium', 'FakeSport123');
    $this->assertEmpty($leagues);

    // Try a fake country and sport.
    $leagues = $this->leagueRepository->byCountryAndSport('FakeCountry123', 'FakeSport123');
    $this->assertEmpty($leagues);
  }

  /**
   * @covers TheSportsDb\Entity\Repository\LeagueRepository::bySport
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeArray
   * @covers TheSportsDb\Entity\Repository\Repository::normalizeEntity
   */
  public function testBySport() {
    $leagues = $this->leagueRepository->bySport('Soccer');
    $this->assertNotEmpty($leagues);
    foreach ($leagues as $league) {
      // Should be a league.
      $this->assertInstanceOf(LeagueInterface::class, $league);
      $this->assertEquals('Soccer', $league->getSport()->getName());
    }

    // Try a fake sport.
    $leagues = $this->leagueRepository->byCountry('FakeSport123');
    $this->assertEmpty($leagues);
  }

}
