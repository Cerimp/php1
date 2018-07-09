<?php

class Uploader
{
    // имя поля формы, от которого мы ожидаем загрузку файла
    public $fieldFile;

    public function __construct($fieldFile)
    {
        $this->fieldFile = $fieldFile;
    }

    public function isUploaded() {
        if (0 == $_FILES[$this->fieldFile]['error']) {
            return true;
        }
        return false;
    }

    public function upload() {
       if ($this->isUploaded()) {
           move_uploaded_file(
               $_FILES[$this->fieldFile]['tmp_name'],
               __DIR__.'/../images/'.$_FILES[$this->fieldFile]['name']
           );
       }
    }

}