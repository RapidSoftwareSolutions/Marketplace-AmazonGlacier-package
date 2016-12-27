<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class AmazonGlacierTest extends BaseTestCase {
    
    public function testPackage() {
        
        $routes = [
            'createVault',
            'addTagsToVault',
            'setVaultAccessPolicy',
            'configureVaultNotification',
            'getVaults',
            'getVault',
            'getVaultAccessPolicy',
            'initiateVaultLock',
            'getVaultLock',
            'abortVaultLock',
            'completeVaultLock',
            'getVaultNotifications',
            'getVaultTags',
            'deleteVaultTags',
            'deleteVaultNotifications',
            'deleteVaultAccessPolicy',
            'deleteVault',
            'uploadArchive',
            'deleteArchive',
            'createMultipartUpload',
            'uploadArchivePart',
            'getMultipartUploads',
            'getArchiveParts',
            'abortMultipartUpload',
            'completeMultipartUpload',
            'createJob',
            'getJobs',
            'getSingleJob',
            'downloadJobOutput',
            'setDataRetrievalPolicy',
            'getDataRetrievalPolicy',
            'getAccountProvisionedCapacity',
        ];
        
        foreach($routes as $file) {
            $var = '{  
                        "args":{  
                            "apiKey": "AKIAJUE5X2UUUDCNXLEA",
                            "apiSecret": "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",
                            "region": "eu-west-1"
                        }
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/AmazonGlacier/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }
    
}
