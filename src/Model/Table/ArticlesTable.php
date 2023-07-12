<?php

namespace App\Model\Table;
use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table{

    public function initialize(array $config):void{
        $this->addBehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event,$entity,$options){

        if($entity->isNew() && !$entity->slug){
            $slugTitle = Text::slug($entity->title);
            $entity->slug= substr($slugTitle,0,191);        }
    }

    public function validationDefault(Validator $validator):Validator{
        $validator->notEmptyString('title')->minLength('title',5)->maxLength('title',15)->notEmptyString('body')->minLength('body',5)->maxLength('body',255);
        return $validator;
    }
}