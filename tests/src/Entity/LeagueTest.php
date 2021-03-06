<?php

namespace TheSportsDb\Test\Entity;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-09-07 at 11:43:32.
 */
class LeagueTest extends AbstractEntityTest {

  protected $entityClass = '\\TheSportsDb\\Entity\\League';
  /**
   * @covers TheSportsDb\Entity\League::getId
   * @covers TheSportsDb\Entity\League::getName
   * @covers TheSportsDb\Entity\League::getSport
   * @covers TheSportsDb\Entity\League::getAlternateName
   * @covers TheSportsDb\Entity\League::getFormedYear
   * @covers TheSportsDb\Entity\League::getDateFirstEvent
   * @covers TheSportsDb\Entity\League::getGender
   * @covers TheSportsDb\Entity\League::getCountry
   * @covers TheSportsDb\Entity\League::getWebsite
   * @covers TheSportsDb\Entity\League::getFacebook
   * @covers TheSportsDb\Entity\League::getTwitter
   * @covers TheSportsDb\Entity\League::getYoutube
   * @covers TheSportsDb\Entity\League::getRss
   * @covers TheSportsDb\Entity\League::getDescription
   * @covers TheSportsDb\Entity\League::getBanner
   * @covers TheSportsDb\Entity\League::getBadge
   * @covers TheSportsDb\Entity\League::getLogo
   * @covers TheSportsDb\Entity\League::getPoster
   * @covers TheSportsDb\Entity\League::getTrophy
   * @covers TheSportsDb\Entity\League::getNaming
   * @covers TheSportsDb\Entity\League::getLocked
   * @covers TheSportsDb\Entity\League::getSeasons
   */
  public function testGetters() {
    parent::testGetters();
  }

  /**
   * @covers TheSportsDb\Entity\League::transformSport
   * @todo   Implement testTransformSport().
   */
  public function testTransformSport() {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

  /**
   * @covers TheSportsDb\Entity\League::transformSeasons
   * @todo   Implement testTransformSeasons().
   */
  public function testTransformSeasons() {
    // Remove the following lines when you implement this test.
    $this->markTestIncomplete(
      'This test has not been implemented yet.'
    );
  }

  /**
   * @covers TheSportsDb\Entity\League::initPropertyMapDefinition()
   */
  public function testInitPropertyMapDefinition() {
    parent::testInitPropertyMapDefinition();
  }

}
