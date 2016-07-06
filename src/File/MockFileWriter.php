<?php
namespace OmekaTestHelper\File;
class MockFileWriter {
    protected $files = [];
    public function moveUploadedFile($source,$destination) {
        array_diff($this->files,[$source]);
        $this->files[]=$destination;
        return true;
    }
    public function is_dir($path) {
        return true;
    }

    public function addFile($path) {
        $this->files[]=$path;
    }

    public function fileExists($path) {
        if (in_array($path,$this->files))
            return true;
        return false;
    }

    public function is_writable($path) {
        return true;
    }

    public function chmod($path, $permission) {
        return true;
    }

    public function rename($path, $destination) {
        array_diff($this->files,[$path]);
        $this->files[]=$destination;
        return true;
    }

    public function mkdir($directory_name, $permissions='0777') {
        echo $directory_name;
        return true;
    }

    public function glob($pattern, $flag=0) {
        $file=str_replace('{.*,.,\,,}','.png',$pattern);
        return $this->fileExists($file);
    }
}
