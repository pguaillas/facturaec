<?php

namespace PabloVeintimilla\FacturaEC\Reader;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use PabloVeintimilla\FacturaEC\Model\Voucher;

/**
 * Reader from xml base with common operations.
 *
 * @author Pablo Veintimilla Vargas <pabloveintimilla@gmail.com>
 */
class Reader
{
    /**
     * Full class of voucher to read.
     *
     * @var string;
     */
    private $voucherType = null;

    /**
     * @var Serializer;
     */
    private $serializer;

    /**
     * Xml data to read.
     *
     * @var string
     */
    private $data;

    /**
     * @param string $data        Xml data to read
     * @param string $voucherType Full name of class to read
     */
    public function __construct($data, $voucherType)
    {
        //Check valid voucher type
        if (!is_subclass_of($voucherType, Voucher::class)) {
            throw new \LogicException('Invalid voucher type');
        }
        $this->data = $data;
        $this->voucherType = $voucherType;

        //Instance serializer
        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(
            new IdenticalPropertyNamingStrategy()
        ));

        $this->serializer = $serializer->build();
    }

    /**
     * Deserialize xml into a Voucher object.
     *
     * @return Voucher
     */
    public function deserialize()
    {
        return $this->serializer
                ->deserialize($this->data, $this->voucherType, 'xml');
    }
}
