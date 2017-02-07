[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/AmazonGlacier/functions?utm_source=RapidAPIGitHub_AmazonGlacierFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# AmazonGlacier Package
Amazon Glacier is an extremely low-cost storage service that provides durable storage with security features for data archiving and backup.
* Domain: amazon.com
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Go to [Amazon Console](https://console.aws.amazon.com/console/home?region=us-east-1)
1. Log in or create new account
2. Create new group in Groups section at the left side with necessary polices
3. Create new user and assign to existing group
4. After creating user you will see credentials
 
## AmazonGlacier.createVault
This operation creates a new vault with the specified name.  The name of the vault must be unique within a region for an AWS account.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.addTagsToVault
This operation adds the specified tags to a vault. Each tag is composed of a key and a value. Each vault can have up to 50 tags.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| tags     | JSON       | Json object. The tags to add to the vault. Each tag is composed of a key and a value. The value can be an empty string. See README for more details.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

#### tags format
```json

{
    "examplekey1": "examplevalue1",
    "examplekey2": "examplevalue2"
}
```
## AmazonGlacier.setVaultAccessPolicy
This operation configures an access policy for a vault and will overwrite an existing policy.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| policy   | JSON       | Json object. The vault access policy as a JSON string.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

#### policy format
```json

{
    "Version":"2012-10-17",
    "Statement":[
       {
          "Sid":"cross-account-upload",
          "Principal": {
             "AWS": [
                "arn:aws:iam::828310069596:root"
             ]
          },
          "Effect":"Allow",
          "Action": [
             "glacier:UploadArchive",
             "glacier:InitiateMultipartUpload",
             "glacier:AbortMultipartUpload",
             "glacier:CompleteMultipartUpload"
          ],
          "Resource": [
             "arn:aws:glacier:eu-west-1:828310069596:vaults/test"                                           
          ]
       }
    ]
}
```
## AmazonGlacier.configureVaultNotification
This operation configures notifications that will be sent when specific events happen to a vault. By default, you don't get any notifications.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| events   | JSON       | Array of strings. An array of one or more events for which you want Amazon Glacier to send notification. Valid Values: ArchiveRetrievalCompleted; InventoryRetrievalCompleted
| SNSTopic | String     | The Amazon SNS topic ARN.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

#### events format
```json

["ArchiveRetrievalCompleted", "InventoryRetrievalCompleted"]
```
## AmazonGlacier.getVaults
This operation lists all vaults owned by the calling user's account. The list returned in the response is ASCII-sorted by vault name.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| limit    | String     | The maximum number of vaults to be returned. The default limit is 1000. The number of vaults returned might be fewer than the specified limit, but the number of returned vaults never exceeds the limit.
| marker   | String     | A string used for pagination. The marker specifies the vault ARN after which the listing of vaults should begin.

## AmazonGlacier.getVault
This operation returns information about a vault, including the vault Amazon Resource Name (ARN), the date the vault was created, the number of archives contained within the vault, and the total size of all the archives in the vault. 

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.getVaultAccessPolicy
This operation retrieves the access-policy subresource set on the vault. If there is no access policy set on the vault, the operation returns a 404 Not found error.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.initiateVaultLock
This operation initiates the vault locking process by doing the following: Installing a vault lock policy on the specified vault; Setting the lock state of vault lock to InProgress; Returning a lock ID, which is used to complete the vault locking process.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| policy   | JSON       | The vault lock policy. See README for more details.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

#### policy format
```json

{
    "Version":"2012-10-17",
    "Statement":[  
        {  
            "Sid":"Define-vault-lock",
            "Effect":"Deny",
            "Principal":{  
                "AWS":"arn:aws:iam::828310069596:root"
            },
            "Action":"glacier:DeleteArchive",
            "Resource":"arn:aws:glacier:eu-west-1:828310069596:vaults/test",
            "Condition":{  
                "NumericLessThanEquals":{  
                    "glacier:ArchiveAgeinDays":"365"
                }
            }
        }
    ]
}
```
## AmazonGlacier.getVaultLock
This operation retrieves the following attributes from the lock-policy subresource set on the specified vault: The vault lock policy set on the vault, The state of the vault lock, which is either InProgess or Locked, When the lock ID expires. The lock ID is used to complete the vault locking process, When the vault lock was initiated and put into the InProgress state.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.abortVaultLock
This operation aborts the vault locking process if the vault lock is not in the Locked state. If the vault lock is in the Locked state when this operation is requested, the operation returns an AccessDeniedException error. Aborting the vault locking process removes the vault lock policy from the specified vault.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.completeVaultLock
This operation completes the vault locking process by transitioning the vault lock from the InProgress state to the Locked state, which causes the vault lock policy to become unchangeable. A vault lock is put into the InProgress state by calling InitiateVaultLock.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| lockId   | String     | The lockId value is the lock ID obtained from a InitiateVaultLock request.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.getVaultNotifications
This operation retrieves the notification-configuration subresource of the specified vault.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.getVaultTags
This operation lists all the tags attached to a vault. The operation returns an empty map if there are no tags.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.deleteVaultTags
This operation removes one or more tags from the set of tags attached to a vault.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| tagKeys  | JSON       | Array of strings. A list of tag keys. Each corresponding tag is removed from the vault. See README for more details.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

#### tagKeys format
```json

["examplekey1"]
```
## AmazonGlacier.deleteVaultNotifications
This operation deletes the notification configuration set for a vault.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.deleteVaultAccessPolicy
This operation deletes the access policy associated with the specified vault.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.deleteVault
This operation deletes a vault. Amazon Glacier will delete a vault only if there are no archives in the vault as per the last inventory and there have been no writes to the vault since the last inventory. If either of these conditions is not satisfied, the vault deletion fails (that is, the vault is not removed) and Amazon Glacier returns an error.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.uploadArchive
This operation adds an archive to a vault. For a successful upload, your data is durably persisted. In response, Amazon Glacier returns the archive ID in the x-amz-archive-id header of the response. You should save the archive ID returned so that you can access the archive later.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| vaultName         | String     | The name of the vault.
| sourceFile        | File       | The archived file to be uploaded.
| accountId         | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| archiveDescription| String     | The optional description of the archive you are uploading.
| checksum          | String     | The SHA256 tree hash of the data being uploaded.
| contentSHA256     | String     | A SHA256 hash of the content of the request body.

## AmazonGlacier.deleteArchive
This operation deletes an archive from a vault. Subsequent requests to initiate a retrieval of this archive will fail.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| archiveId| String     | The ID of the archive to delete.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.createMultipartUpload
This operation initiates a multipart upload. Amazon Glacier creates a multipart upload resource and returns its ID in the response.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| vaultName         | String     | The name of the vault.
| partSize          | String     | The size of each part except the last, in bytes. The last part can be smaller than this part size. The part size must be a megabyte (1024 KB) multiplied by a power of 2, for example 1048576 (1 MB), 2097152 (2 MB), 4194304 (4 MB), 8388608 (8 MB), and so on. The minimum allowable part size is 1 MB, and the maximum is 4 GB (4096 MB).
| accountId         | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| archiveDescription| String     | The archive description that you are uploading in parts.

## AmazonGlacier.uploadArchivePart
This operation uploads a part of an archive. You can upload archive parts in any order. You can also upload them in parallel. You can upload up to 10,000 parts for a multipart upload.

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| API key obtained from Amazon.
| apiSecret    | credentials| API secret obtained from Amazon.
| region       | String     | Region.
| vaultName    | String     | The name of the vault.
| uploadId     | String     | The upload ID of the multipart upload.
| sourceFile   | File       | The archived file to be uploaded.
| range        | String     | Identifies the range of bytes in the assembled archive that will be uploaded in this part. Amazon Glacier uses this information to assemble the archive in the proper sequence. The format of this header follows RFC 2616. An example: bytes 0-4194303/*.
| accountId    | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| checksum     | String     | The SHA256 tree hash of the data being uploaded.
| contentSHA256| String     | A SHA256 hash of the content of the request body.

## AmazonGlacier.getMultipartUploads
This operation lists in-progress multipart uploads for the specified vault. An in-progress multipart upload is a multipart upload that has been initiated by an InitiateMultipartUpload request, but has not yet been completed or aborted. The list returned in the List Multipart Upload response has no guaranteed order.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| limit    | String     | Specifies the maximum number of uploads returned in the response body. If this value is not specified, the List Uploads operation returns up to 1,000 uploads.
| marker   | String     | An opaque string used for pagination. This value specifies the upload at which the listing of uploads should begin. Get the marker value from a previous List Uploads response. You need only include the marker if you are continuing the pagination of results started in a previous List Uploads request.

## AmazonGlacier.getArchiveParts
This operation lists the parts of an archive that have been uploaded in a specific multipart upload.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| uploadId | String     | The upload ID of the multipart upload.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| limit    | String     | Specifies the maximum number of uploads returned in the response body. If this value is not specified, the List Uploads operation returns up to 1,000 uploads.
| marker   | String     | An opaque string used for pagination. This value specifies the upload at which the listing of uploads should begin. Get the marker value from a previous List Uploads response. You need only include the marker if you are continuing the pagination of results started in a previous List Uploads request.

## AmazonGlacier.abortMultipartUpload
This operation aborts a multipart upload identified by the upload ID.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| uploadId | String     | The upload ID of the multipart upload to delete.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.completeMultipartUpload
You call this operation to inform Amazon Glacier that all the archive parts have been uploaded and that Amazon Glacier can now assemble the archive from the uploaded parts. After assembling and saving the archive to the vault, Amazon Glacier returns the URI path of the newly created archive resource.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key obtained from Amazon.
| apiSecret  | credentials| API secret obtained from Amazon.
| region     | String     | Region.
| vaultName  | String     | The name of the vault.
| uploadId   | String     | The upload ID of the multipart upload to delete.
| archiveSize| String     | The total size, in bytes, of the entire archive. This value should be the sum of all the sizes of the individual parts that you uploaded.
| checksum   | String     | The SHA256 tree hash of the entire archive. It is the tree hash of SHA256 tree hash of the individual parts. If the value you specify in the request does not match the SHA256 tree hash of the final assembled archive as computed by Amazon Glacier, Amazon Glacier returns an error and the request fails.
| accountId  | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.createJob
This operation initiates a job of the specified type, which can be an archive retrieval or vault inventory retrieval.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| API key obtained from Amazon.
| apiSecret         | credentials| API secret obtained from Amazon.
| region            | String     | Region.
| vaultName         | String     | The name of the vault.
| type              | String     | The job type. You can initiate a job to retrieve an archive or get an inventory of a vault. Valid Values: archive-retrieval, inventory-retrieval
| accountId         | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| archiveId         | String     | The ID of the archive that you want to retrieve. This field is required only if Type is set to archive-retrieval.
| description       | String     | The optional description for the job.
| format            | String     | When initiating a job to retrieve a vault inventory, you can optionally add this parameter to your request to specify the output format. If you are initiating an inventory job and do not specify a Format field, JSON is the default format. Valid Values: CSV; JSON
| retrievalByteRange| String     | The byte range to retrieve for an archive retrieval. in the form "StartByteValue-EndByteValue" If not specified, the whole archive is retrieved. If specified, the byte range must be megabyte (1024*1024) aligned, which means that StartByteValue must be divisible by 1 MB, and the EndByteValue plus 1 must be divisible by 1 MB or be the end of the archive specified as the archive byte size value minus 1. If RetrievalByteRange is not megabyte aligned, this operation returns a 400 response.
| SNSTopic          | String     | The Amazon SNS topic ARN where Amazon Glacier sends a notification when the job is completed, and the output is ready for you to download.
| tier              | String     | The retrieval option to use for the archive retrieval. Standard is the default value used. Valid Values: Expedited; Standard; Bulk
| startDate         | String     | The start of the date range in UTC for vault inventory retrieval that includes archives created on or after this date. Valid Values: A string representation of ISO 8601 date format YYYY-MM-DDThh:mm:ssTZD in seconds, for example 2013-03-20T17:03:43Z.
| endDate           | String     | The end of the date range in UTC for vault inventory retrieval that includes archives created before this date. Valid Values: A string representation of ISO 8601 date format YYYY-MM-DDThh:mm:ssTZD in seconds, for example 2013-03-20T17:03:43Z.
| limit             | String     | The maximum number of inventory items returned per vault inventory retrieval request.
| marker            | String     | An opaque string that represents where to continue pagination of the vault inventory retrieval results. You use the marker in a new Initiate Job request to obtain additional inventory items. If there are no more inventory items, this value is null.

## AmazonGlacier.getJobs
This operation lists jobs for a vault, including jobs that are in-progress and jobs that have recently finished.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| API key obtained from Amazon.
| apiSecret | credentials| API secret obtained from Amazon.
| region    | String     | Region.
| vaultName | String     | The name of the vault.
| accountId | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| completed | String     | The state of the jobs to return. You can specify true or false.
| limit     | String     | The maximum number of jobs to be returned. The default limit is 1000. The number of jobs returned might be fewer than the specified limit but the number of returned jobs never exceeds the limit.
| marker    | String     | An opaque string used for pagination that specifies the job at which the listing of jobs should begin. You get the marker value from a previous List Jobs response. You only need to include the marker if you are continuing the pagination of the results started in a previous List Jobs request.
| statuscode| String     | The type of job status to return. Constraints: One of the values InProgress, Succeeded, or Failed.

## AmazonGlacier.getSingleJob
This operation returns information about a job you previously initiated, including the job initiation date, the user who initiated the job, the job status code/message and the Amazon SNS topic to notify after Amazon Glacier completes the job.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| jobId    | String     | The ID of the job to describe.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.downloadJobOutput
This operation downloads the output of the job you initiated using Initiate Job (POST jobs). Depending on the job type you specified when you initiated the job, the output will be either the content of an archive or a vault inventory.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| vaultName| String     | The name of the vault.
| jobId    | String     | The job ID whose data is downloaded.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| range    | String     | The range of bytes to retrieve from the output. For example, if you want to download the first 1,048,576 bytes, specify the range as bytes=0-1048575. By default, this operation downloads the entire output.

## AmazonGlacier.setDataRetrievalPolicy
This operation sets and then enacts a data retrieval policy in the region specified in the PUT request. You can set one policy per region for an AWS account. The policy is enacted within a few minutes of a successful PUT operation.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key obtained from Amazon.
| apiSecret   | credentials| API secret obtained from Amazon.
| region      | String     | Region.
| strategy    | String     | The type of data retrieval policy to set. Valid values: BytesPerHour; FreeTier; None
| accountId   | String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".
| bytesPerHour| String     | The maximum number of bytes that can be retrieved in an hour. This field is required only if the value of the Strategy field is BytesPerHour.

## AmazonGlacier.getDataRetrievalPolicy
This operation returns the current data retrieval policy for the account and region specified in the GET request.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.getAccountProvisionedCapacity
This operation lists the provisioned capacity for the specified AWS account.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

## AmazonGlacier.purchaseCapacity
This operation purchases a provisioned capacity unit for an AWS account.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| API key obtained from Amazon.
| apiSecret| credentials| API secret obtained from Amazon.
| region   | String     | Region.
| accountId| String     | The AccountId value is the AWS account ID. This value must match the AWS account ID associated with the credentials used to sign the request. You can either specify an AWS account ID or optionally a single '-' (hyphen), in which case Amazon Glacier uses the AWS account ID associated with the credentials used to sign the request. If you specify your account ID, do not include any hyphens ('-') in the ID. Default value: "-".

