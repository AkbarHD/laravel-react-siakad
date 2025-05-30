<?php
namespace App\Enums;

enum MessageType: string
{
    // nilai enum ada 4
    case CREATED = 'Berhasil menambahkan';
    case UPDATED = 'Berhasil memperbarui';
    case DELETED = 'Berhasil menghapus';
    case ERROR = 'Terjadi kesalahan. Silahkan coba lagi nanti';

    public function message(string $entity = '', ?string $error = null):string
    {
        // jika error ada
        if($this === MessageType::ERROR && $error){
            return "{$this->value} {$error}";
        }

        return "{$this->value} {$entity}";
    }
}
