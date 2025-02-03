<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserImageService
{
    public function saveImageToUser(UploadedFile $image, User $user)
    {
        $filename = $this->replaceImage($image, $user);
        return $filename; // Retorna apenas o nome do arquivo
    }

    public function replaceImage(UploadedFile $image, User $user)
    {
        if ($this->hasImage($user)) {
            $oldImage = $user->image;
            Storage::disk('s3')->delete('personalProfiles/' . $oldImage); // Deleta a imagem antiga do S3
        }

        $newImage = $this->saveImage($image);
        return $newImage;
    }

    public function hasImage(User $user)
    {
        return $user->image !== null;
    }

    public function saveImage(UploadedFile $image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        Storage::disk('s3')->putFileAs('personalProfiles/', $image, $imageName); // Salva no S3

        return $imageName;
    }
}
