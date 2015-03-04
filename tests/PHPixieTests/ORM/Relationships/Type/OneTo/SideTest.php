<?php

namespace PHPixieTests\ORM\Relationships\Type\OneTo;

/**
 * @coversDefaultClass \PHPixie\ORM\Relationships\Type\OneTo\Side
 */
abstract class SideTest extends \PHPixieTests\ORM\Relationships\Relationship\Implementation\SideTest
{
    protected $type = 'owner';
    protected $relationshipType;
    protected $itemSideName;
    protected $ownerProperty;


    public function setUp()
    {
        parent::setUp();
        $this->sides = array(
            'owner' => $this->getSide('owner'),
            $this->itemSideName => $this->getSide($this->itemSideName)
        );
    }

    /**
     * @covers ::modelName
     * @covers ::<protected>
     */
    public function testModelName()
    {
        $this->assertSidesMethod('modelName', array(
            'owner'  => 'flower',
            $this->itemSideName => 'fairy'
        ));
    }
    
    /**
     * @covers ::relatedModelName
     * @covers ::<protected>
     */
    public function testRelatedModelName()
    {
        $this->assertSidesMethod('relatedModelName', array(
            'owner'  => 'fairy',
            $this->itemSideName => 'flower'
        ));
    }

    /**
     * @covers ::propertyName
     * @covers ::<protected>
     */
    public function testPropertyName()
    {
        $this->assertSidesMethod('propertyName', array(
            'owner'  => 'pixie',
            $this->itemSideName => $this->ownerProperty
        ));
    }

    protected function config()
    {
        $config = $this->getConfig();

        $config->ownerModel = 'fairy';
        $config->itemModel  = 'flower';

        $this->method($config, 'ownerProperty', $this->ownerProperty, array());
        $config->itemOwnerProperty  = 'pixie';

        return $config;
    }

    abstract protected function getConfig();

}
