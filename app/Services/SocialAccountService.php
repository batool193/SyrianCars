<?php

namespace App\Services;

use Exception;
use App\Models\SocialAccount;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SocialAccountService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all SocialAccounts information
     */
    public function listSocialAccount(int $perPage) {
        try {
            return SocialAccount::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing SocialAccount '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new SocialAccount.
     * @param array $fieldInputs
     * @return \App\Models\SocialAccount
     */
    public function createSocialAccount(array $fieldInputs)
    {
        try{
            return SocialAccount::create([
                    'provider_name' => $fieldInputs["provider_name"],
                    'provider_id' => $fieldInputs["provider_id"],
                    'user_id' => $fieldInputs["user_id"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating SocialAccount: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific SocialAccount.
     *
     * @param \App\Models\SocialAccount $SocialAccount
     * @return \App\Models\SocialAccount
     */
    public function getSocialAccount(SocialAccount $SocialAccount)
    {
        try {
            return $SocialAccount;
        } catch (Exception $e) {
            Log::error('Error retrieving SocialAccount: ' . $e->getMessage());
            throw new Exception('Error retrieving SocialAccount.');
        }
    }

    /**
     * Update a specific SocialAccount.
     *
     * @param array $fieldInputs
     * @param SocialAccount $SocialAccount
     * @return \App\Models\SocialAccount
     */
    public function updateSocialAccount(array $fieldInputs, $SocialAccount) {
        try {
            $data = [
                    "provider_name" => $fieldInputs["provider_name"],
                    "provider_id" => $fieldInputs["provider_id"],
                    "user_id" => $fieldInputs["user_id"],
        ];
            $SocialAccount->update(array_filter($data));
            return $SocialAccount;
        } catch (Exception $e) {
            Log::error('Error updating SocialAccount: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific SocialAccount.
     *
     * @param SocialAccount $SocialAccount
     * @return void
     */
    public function deleteSocialAccount($SocialAccount){
        try {
            $SocialAccount->delete();
        } catch (Exception $e) {
            Log::error('Error deleting SocialAccount '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}