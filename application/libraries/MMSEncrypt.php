<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package Security
 */
class MMSEncrypt
{
    private $CI;

    private $Encryption;

    private $key;

    /**
     * This is constructor
     */
    public function __construct($config = array())
    {
        $this->CI = &get_instance();

        if (count($config)>0) {
            $this->initialize($config);
        }

        // initialize encryption library, for this purpose we will just use CI Encrypt library to help
        // since it may affect the rest of the code that use the library, we will create a new instance
        // if we ever need to move to a different library, changes can be easily done
        $this->CI->load->library('encrypt');

        $this->Encryption = new CI_Encrypt();

//        $this->Encryption->set_key('5MFXIVfJ0c5t6D09HaV9o436tYwYHkwt');
        $this->Encryption->set_key('5AFXIVeJ1c5t6D09JaV9o426tYwYHkwt');
    }

    protected function initialize($config)
    {
        foreach ($config as $key=>$value) {
            $this->$key = $value;
        }
    }

    /**
     *
     * To encrypt a data
     *
     * @param $data value to be encrypted
     * @return string encryptedValue
     */
    public function encrypt($data) {
        if (empty($data)) {
            return $data;
        }

        return $this->Encryption->encode($data);
        // return $data;
    }

    /**
     *
     * To encrypt a data
     *
     * @param $data value to be encrypted
     * @return string encryptedValue
     */
    public function decrypt($data) {
        if (empty($data)) {
            return $data;
        }

        return $this->Encryption->decode($data);
        // return $data;
    }

    /**
     * To hash a data
     *
     * @param  string $data data to be hashed
     * @return string       hashed value
     */
    public function hash($data) {
        if (empty($data)) {
            return $data;
        }

//        return  hash_hmac('sha512', strtolower($data), 'o7SOh1QUF7kM70D85BzKnVaPji95SC26');
        return  hash_hmac('sha512', strtolower($data), 'o7SOh1QUf7kM90D86bZKnVaPjI85Sc26');
        // return $data;
    }
}
