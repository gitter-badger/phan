<?php declare(strict_types=1);
namespace Phan\Language\Element;

use \Phan\Language\FQSEN;

interface Addressable {

    /**
     * @return FQSEN
     * The fully-qualified structural element name of this
     * structural element
     */
    abstract public function getFQSEN() : FQSEN;

    /**
     * @param FQSEN $fqsen
     * A fully qualified structural element name to set on
     * this element
     *
     * @return null
     */
    abstract public function setFQSEN(FQSEN $fqsen);

    /**
     * Implementing classes must have a getFlags() method
     * that returns flags on the class
     */
    abstract public function getFlags() : int;

    /**
     * @return bool
     * True if this is a public property
     */
    abstract public function isPublic();

    /**
     * @return bool
     * True if this is a protected property
     */
    abstract public function isProtected();

    /**
     * @return bool
     * True if this is a private property
     */
    abstract public function isPrivate();
}
