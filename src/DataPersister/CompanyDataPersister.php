<?php

namespace App\DataPersister;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class CompanyDataPersister implements ContextAwareDataPersisterInterface {

    private $_entityManager;
    private $_slugger;
    private $_request;

    public function __construct(
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        RequestStack $request
    ){
        $this->_entityManager = $entityManager;
        $this->_slugger = $slugger;
        $this->_request = $request->getCurrentRequest();
    }
    /**
     * {@inheritdoc}
     */    
    public function supports( $data, array $context = []): bool
    {

        return $data instanceof Company;
    }

     /**
     * @param Company $data
     */
    public function persist($data, array $context = []){
        // dd($data);
        if(!$data->getIsDesactive()){
        $data->setSlug(
            $this ->_slugger
                    ->slug(strtolower($data->getName())). '-' .uniqid()
        );  }
        if($this->_request->getMethod() !== 'POST'){
            $data->setUpdatedAt(new \DateTime());
        }
        $this->_entityManager->persist($data);
        $this->_entityManager->flush();
    }
    /**
     * {@inheritdoc}
     */
    public function remove($data, array $context = []){
        $this->_entityManager->remove($data);
        $this->_entityManager->flush();
    }
}