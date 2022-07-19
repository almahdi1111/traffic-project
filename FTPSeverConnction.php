<?php

class FTPConection
{

    public $ftp;
    public function ConnectedToServer($ftpHost = 'ftp.marketplace.envato.com',$ftpUsername = 'K_Media2020',$ftpPassword = 'hOtP8r05zsnBrbgZG1kMzC1jKJ0pGoiQ')
    {
        $this->ftp = ftp_ssl_connect($ftpHost) or die("Couldn't connect to $ftpHost");
        $ftpLogin = ftp_login($this->ftp, $ftpUsername, $ftpPassword); 
        ftp_pasv($this->ftp, true);
        
    }
    public function closeConnection()
    {
        ftp_close($this->ftp);
    }

}
?>