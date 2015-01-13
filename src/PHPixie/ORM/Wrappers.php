<?php

namespace PHPixie\ORM;

abstract class Wrappers
{
    public function databaseRepositoryWrapper($repository)
    {
        $method = $repository->modelName().'Repository';
        return $this->$method($repository);
    }
    
    public function databaseQueryWrapper($query)
    {
        $method = $query->modelName().'Query';
        return $this->$method($query);
    }
    
    public function databaseEntityWrapper($entity)
    {
        return $this->entityWrapper($entity);
    }
    
    public function embeddedEntityWrapper($entity)
    {
        return $this->entityWrapper($entity);
    }
    
    protected function entityWrapper($entity)
    {
        $method = $entity->modelName().'Entity';
        return $this->$method($entity);
    }
    
    abstract public function databaseRepositories();
    abstract public function databaseQueries();
    abstract public function databaseEntities();
    abstract public function embeddedEntities();
}