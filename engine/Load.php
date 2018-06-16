<?php

namespace Engine;

use Engine\DI\DI;

class Load
{
    const MASK_MODEL_ENTITY     = '\%s\Model\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';

    /**
     * @var Engine
     */
    public $di;

    /**
     * Load constructor.
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    /**
     * @param $modelName
     * @param bool $modelDir
     * @return \stdClass
     */
    public function model($modelName, $modelDir = false)
    {

        $modelName  = ucfirst($modelName);
        $modelDir   = $modelDir ? $modelDir : $modelName;

        $namespaceModel = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $isClassModel = class_exists($namespaceModel);

        /*if ($isClassModel){
            //$this->di->set($modelName, new $namespaceModel($this->di));
            $this->di->push('model',[
                'key' => lcfirst($modelName),
                'value'=> new $namespaceModel($this->di)
            ]);
        }*/
        if ($isClassModel) {
         //   $modelRegistry = $this->di->get('model') ?: new \stdClass();
            $modelRegistry = new \stdClass();
            $modelRegistry->{lcfirst($modelName)} = new $namespaceModel($this->di);

            $this->di->set('model', $modelRegistry);
        }
        return $isClassModel;
    }
}