<?php

namespace People\V1\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    private $entity = "People\V1\Entity\User";

    public function getArrayWhitelist() {

        return [
            "like" => [
                'firstName',
                'lastName',
                'occupation',
            ],
            "identical" => [
                'ref',
                'birthDay',
                'birthMonth',
                'birthYear',
            ],
            "address" => [
                'state',
                'country',
                'city',
                'zipCod',
            ],
            "email" => [
                'email',
            ],
            "phone" => [
                'phone',
            ],
        ];
    }

    public function getFetchAll($params = [] , $id = null) {

        $whileList = $this->getArrayWhitelist();
        $query = $this->getEntityManager()->createQueryBuilder()
                ->select("u", "p", "e", "a")
                ->from($this->entity, "u")
                ->leftJoin("u.phones", "p")
                ->leftJoin("u.emails", "e")
                ->leftJoin("u.address", "a");

        if(null !== $id):
            $query->andWhere("u.idUser = :id")
                ->setParameter('id', $id);

            return $query->getQuery()->getArrayResult();
        endif;
        
        $n = 1;
        foreach ($params as $key => $value) {
            if (in_array($key, $whileList["like"])):
                $query->andWhere("u.$key LIKE ?$n")
                        ->setParameter($n, "%" . $value . "%");
            endif;
            if (in_array($key, $whileList["identical"])):
                $query->andWhere("u.$key = ?$n")
                        ->setParameter($n, $value);
            endif;
            if (in_array($key, $whileList["address"])):
                $query->andWhere("a.$key = ?$n")
                        ->setParameter($n, $value);
            endif;
            if (in_array($key, $whileList["email"])):
                $query->andWhere("e.$key LIKE ?$n")
                        ->setParameter($n, "%" . $value . "%");
            endif;
            if (in_array($key, $whileList["phone"])):
                $query->andWhere("p.$key LIKE ?$n")
                        ->setParameter($n, "%" . $value . "%");
            endif;
            
            $n++;
        }

       return $query->getQuery()->getArrayResult();
    }

    public function getSearchPageList($params = []) {
        $v = $params["query"];
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select("u", "p", "e", "a")
            ->from($this->entity, "u")
            ->leftJoin("u.phones", "p")
            ->leftJoin("u.emails", "e")
            ->leftJoin("u.address", "a")
            ->where("u.firstName LIKE :firstName")
            ->setParameter("firstName", "%" . $v . "%")
            ->orWhere("u.lastName LIKE :lastName")
            ->setParameter("lastName", "%" . $v . "%")
            ->orWhere("u.ref = :ref")
            ->setParameter("ref", $v)
            ->orWhere("e.email LIKE :email")
            ->setParameter("email", "%" . $v . "%")
            ->orWhere("p.phone LIKE :phone")
            ->setParameter("phone", "%" . $v . "%");

        return $query->getQuery()->getArrayResult();
    }

    function test(){
        return 'ok';
    }
}
