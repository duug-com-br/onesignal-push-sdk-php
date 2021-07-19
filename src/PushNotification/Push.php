<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 06/05/2019
 * Time: 16:42
 */

// NameSpace
namespace PushNotification;


/**
 * Class Push
 * @package PushNotification
 */
class Push
{
    // Variaveis
    private $pusher;
    private $options;

    // Inicia o método construtor
    public function __construct()
    {
        // Preenche as opcoes
        $this->options = [
            "pusher_debug" => false,
            "pusher_scheme" => null,
            "pusher_host" => null,
            "pusher_port" => null,
            "pusher_timeout" => null,
            "pusher_encrypted" => null
        ];

    } // END >> Fun::__construct()


    /**
     * Método responsável por modificar as opções extra
     * do sistema.
     * -------------------------------------------------------
     * @param null $scheme
     * @param null $host
     * @param null $port
     * @param null $time
     * @param null $encrypted
     */
    public function setOptions($scheme = null, $host = null, $port = null, $time = null, $encrypted = null)
    {
        // Adiciona as opções no array
        $this->options = [
            "pusher_scheme" => $scheme,
            "pusher_host" => $host,
            "pusher_port" => $port,
            "pusher_timeout" => $time,
            "pusher_encrypted" => $encrypted
        ];

        $this->options = array_filter($this->options);
    }


    /**
     * Método responsável por inicializar o objeto pusher
     * para que possa ser feita os envios.
     * -------------------------------------------------------
     * @param $id
     * @param $key
     * @param $secret
     */
    public function inicialize($id, $key, $secret)
    {
        // Crie um objeto Pusher apenas se ainda não tivermos um
        if (!isset($this->pusher))
        {
            // Create new Pusher object
            $this->pusher = new \PushNotification\Control\Pusher($key, $secret, $id, $this->options);
        }
    }


    /**
     * Método responsável por retornar o objeto pusher
     * criado anteriormente.
     * -------------------------------------------------------
     * @return  Object
     */
    public function getPusher()
    {
        return $this->pusher;
    }


} // END >> Class::Push