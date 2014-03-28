<?php

namespace PHPixie\ORM\Relationships\Types\Embeds\Side\Config\Embedded;

class Config {

    public $name;
	public $type;
	public $ownerProperty;
    public $modelName;
    public $map;
    
    public function __construct($embeddedConfig, $inflector, $name, $defaultOwnerProperty, $config)
    {
        $this->name = $name;
		$this->ownerProperty = $config->get('owner_property', $defaultOwnerProperty);
		
        $this->type = $config->get('type', 'subdocument');
        
        if ($this->type !== 'subdocument' && $this->type !== 'array')
            throw new \PHPixie\ORM\Exception\Mapper("Embed type must be either 'subdocument' or 'array'");
        
        if(($modelName = $config->get('model')) === null) {
            if($this->type === 'subdocument'){
                $modelName = $propertyName;
            }else{
                $modelName = $inflector->singular($propertyName);
            }
        }
        
        $this->modelName = $modelName;
        $this->map = $embeddedConfig->map($config->slice('embeds'), $this->name);
    }
}