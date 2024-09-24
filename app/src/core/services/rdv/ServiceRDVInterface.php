<?php

namespace toubeelib\core\services\rdv;

use toubeelib\core\dto\InputRDVDTO;
use toubeelib\core\dto\RDVDTO;

interface ServiceRDVInterface
{
    
    public function createRDV(InputRDVDTO $p): RDVDTO;

    public function getRDVById(string $idRDV): RDVDTO;

    public function updateRDV(InputRDVDTO $p): RDVDTO;

    public function cancelRDV(string $idRDV): void;

    /**
     * @return RDVDTO[]
     */
    public function getRDVByPraticien(string $idPraticien): array;

    /**
     * @return RDVDTO[]
     */
    public function getRDVByPatient(string $idPatient): array;

    // TODO add a method getRDVByPatient

    // public function createPraticien(InputPraticienDTO $p): PraticienDTO;
    // public function getPraticienById(string $id): PraticienDTO;
    // public function getSpecialiteById(string $id): SpecialiteDTO;


}