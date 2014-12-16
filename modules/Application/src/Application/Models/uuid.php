<?php
/**
 * Genera un identificador único universal, en versión 4 (pseudo-aleatorio).
 * @return string
 */

function uuid_v4() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
        mt_rand( 0, 0xffff ),
        // El siguiente bloque comenzará siempre por 4
        mt_rand( 0, 0x0fff ) | 0x4000, 
        // El siguiente bloque comenzará siempre por 8,9,a,b
        mt_rand( 0, 0x3fff ) | 0x8000,
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}