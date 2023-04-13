<?php

namespace App\Services;

use App\Models\Photo;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Storage;
use Symfony\Component\HttpFoundation\Response;
use TCG\Voyager\Facades\Voyager;

class PhotoService
{
    public function __construct()
    {

    }

    public function addWatermark(Photo $photo): void
    {
        if ($photo->photographer) {
            $this->addWatermarkText($photo->image, $photo->photographer->name);
            $this->addWatermarkText($photo->thumbnail('small'), $photo->photographer->name);

            // Log::channel('mark_log')->info("~~~>watermark added photo_id=" . $photo->id . PHP_EOL);
        }
    }

    public function addWatermarkText($imagePath, $photographer): void
    {
        if (!blank($imagePath)) {
            // Log::channel('mark_log')->info($imagePath);
            $imgFile = Storage::disk(config('voyager.storage.disk'))->path("/{$imagePath}");

             Image::make($imgFile)
                ->text("© {$photographer}",
                    20,
                    32,
                    static function ($font) {
                        $font->file(resource_path('fonts/MesloLGS NF Regular.ttf'));
                        $font->size(16);
                        $font->color('#ffffff');
                        $font->align('left');
                        $font->valign('center');
                    })->save($imgFile);
        }
    }

    // {\n
    //     "Owner": {\n
    //         "DisplayName": "terry",\n
    //         "ID": "7d7594429dea27aa8b70d62c7dce5d0141f10dd0cce5f8a80e2d847beca37220"\n
    //     },\n
    //     "Grants": [\n
    //         {\n
    //             "Grantee": {\n
    //                 "DisplayName": "terry",\n
    //                 "ID": "7d7594429dea27aa8b70d62c7dce5d0141f10dd0cce5f8a80e2d847beca37220",\n
    //                 "Type": "CanonicalUser"\n
    //             },\n
    //             "Permission": "FULL_CONTROL"\n
    //         }\n
    //     ],\n
    //     "@metadata": {\n
    //         "statusCode": 200,\n
    //         "effectiveUri": "https:\/\/mra-photo.s3.ap-southeast-2.amazonaws.com\/?acl",\n
    //         "headers": {\n
    //             "x-amz-id-2": "Xa0XnJt7Ub7FDgIm2kX5KeQZ9ZlJ8jRdnXVf9dv94sNoofWXR4c5wGC9\/0+aalMytybGsK1VkhpUvwarRWImAg==",\n
    //             "x-amz-request-id": "4ETPWED9HAKW73AM",\n
    //             "date": "Thu, 16 Jun 2022 12:30:25 GMT",\n
    //             "content-type": "application\/xml",\n
    //             "transfer-encoding": "chunked",\n
    //             "server": "AmazonS3"\n
    //         },\n
    //         "transferStats": {\n
    //             "http": [\n
    //                 []\n
    //             ]\n
    //         }\n
    //     }\n
    // }
    public function checkS3BucketPermissions()
    {
        try {
            $client = Storage::disk('s3')->getClient();
            $result = $client->getBucketAcl([
                'Bucket' => Config::get('filesystems.disks.s3.bucket')
            ]);
            return $result;
        } catch (Exception $exception) {
            Log::channel('mark_log')->info($exception->getTraceAsString());
        }
    }

    // $filePath = storage_path('app/public/photos/June2022/0Ln56yxpB1ZmFPbequ6V.jpg');
    // SAMPLE RESPONSE
    // [
    //     "Expiration" => ""
    //     "ETag" => ""2cf9d9f3f7b89c28e2503450f3df0488""
    //     "ChecksumCRC32" => ""
    //     "ChecksumCRC32C" => ""
    //     "ChecksumSHA1" => ""
    //     "ChecksumSHA256" => ""
    //     "ServerSideEncryption" => ""
    //     "VersionId" => ""
    //     "SSECustomerAlgorithm" => ""
    //     "SSECustomerKeyMD5" => ""
    //     "SSEKMSKeyId" => ""
    //     "SSEKMSEncryptionContext" => ""
    //     "BucketKeyEnabled" => false
    //     "RequestCharged" => ""
    //     "@metadata" => array:4 [
    //       "statusCode" => 200
    //       "effectiveUri" => "https://mra-photo.s3.ap-southeast-2.amazonaws.com/0Ln56yxpB1ZmFPbequ6V.jpg"
    //       "headers" => array:6 [
    //         "x-amz-id-2" => "EdcRuwW2Bn1CVS5JJhrxr/DfeJS92JSI1SSzVUsLuFMC6rXAvYuTnmDdal/kwijh3KkuUlREOh8="
    //         "x-amz-request-id" => "1GW9MJF674ZQZWN3"
    //         "date" => "Thu, 16 Jun 2022 12:40:17 GMT"
    //         "etag" => ""2cf9d9f3f7b89c28e2503450f3df0488""
    //         "server" => "AmazonS3"
    //         "content-length" => "0"
    //       ]
    //       "transferStats" => array:1 [
    //         "http" => array:1 [
    //           0 => []
    //         ]
    //       ]
    //     ]
    //     "ObjectURL" => "https://mra-photo.s3.ap-southeast-2.amazonaws.com/0Ln56yxpB1ZmFPbequ6V.jpg"
    //   ]
    /**
     * Upload to AWS S3 Bucket function
     *
     * @param string $filePath
     * @param string $s3KeyName
     * @param string $requestTimeout
     * @return string|null
     */
    public function uploadToS3Bucket(string $filePath, string $s3KeyName = '', string $requestTimeout = '+10 minutes'): ?string
    {
        try {
            $s3Client = Storage::disk('s3')->getClient();

            // Upload file to the S3 bucket
            $response = $s3Client->putObject([
                'Bucket' => Config::get('filesystems.disks.s3.bucket'),
                'Key' => $s3KeyName,
                'SourceFile' => $filePath,
            ]);

            // If successfully uploaded, request a public URL from the S3 bucket
            if ($response['@metadata']['statusCode'] == Response::HTTP_OK) {
                $cmd = $s3Client->getCommand('GetObject', [
                    'Bucket' => Config::get('filesystems.disks.s3.bucket'),
                    'Key' => $s3KeyName,
                ]);

                $request = $s3Client->createPresignedRequest($cmd, $requestTimeout);

                return (string) $request->getUri();
            }
        } catch (Exception $exception) {
            Log::channel('mark_log')->info($exception->getTraceAsString());
        }
        return '';
    }

    // GuzzleHttp\Psr7\Request^ {#5006
    //     -method: "GET"
    //     -requestTarget: null
    //     -uri: GuzzleHttp\Psr7\Uri^ {#5011
    //       -scheme: "https"
    //       -userInfo: ""
    //       -host: "mra-photo.s3.ap-southeast-2.amazonaws.com"
    //       -port: null
    //       -path: "/9tbISIQzhthc65uaWYf9.jpg"
    //       -query: "X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIA3J7FH5IXDGM4FSUH%2F20220616%2Fap-southeast-2%2Fs3%2Faws4_request&X-Amz-Date=20220616T133028Z&X-Amz-SignedHeaders=host&X-Amz-Expires=600&X-Amz-Signature=2912c9913810a6b5009af0bd8e4851a7d0d69d765fd427429eafb00d1ae5c6bb"
    //       -fragment: ""
    //       -composedComponents: null
    //     }
    //     -headers: array:1 [
    //       "Host" => array:1 [
    //         0 => "mra-photo.s3.ap-southeast-2.amazonaws.com"
    //       ]
    //     ]
    //     -headerNames: array:1 [
    //       "host" => "Host"
    //     ]
    //     -protocol: "1.1"
    //     -stream: GuzzleHttp\Psr7\Stream^ {#5002
    //       -stream: stream resource {@1142
    //         wrapper_type: "PHP"
    //         stream_type: "TEMP"
    //         mode: "w+b"
    //         unread_bytes: 0
    //         seekable: true
    //         uri: "php://temp"
    //         options: []
    //       }
    //       -size: null
    //       -seekable: true
    //       -readable: true
    //       -writable: true
    //       -uri: "php://temp"
    //       -customMetadata: []
    //     }
    //   }
    public function getS3Object(?string $filePath, string $requestTimeout = '+10 minutes'): ?string
    {
        if (!empty($filePath)) {
            if (isProduction()) {
                try {
                    $s3Client = Storage::disk('s3')->getClient();
                    $cmd = $s3Client->getCommand('GetObject', [
                        'Bucket' => Config::get('filesystems.disks.s3.bucket'),
                        'Key' => $filePath,
                    ]);

                    $request = $s3Client->createPresignedRequest($cmd, $requestTimeout);

                    return (string) $request->getUri();

                } catch (Exception $exception) {
                    // Log::channel('mark_log')->info($exception->getTraceAsString());
                    return Voyager::image($filePath);
                }
            }

            if (config('app.env') === 'local') {
                return Voyager::image($filePath);
            }
        }
        return "";
    }

    public function deleteS3Object(string $filePath)
    {
        try {
            $s3Client = Storage::disk('s3')->getClient();
            $response = $s3Client->deleteObject([
                'Bucket' => Config::get('filesystems.disks.s3.bucket'),
                'Key' => $filePath,
            ]);
            return $response;
        } catch (Exception $exception) {
            Log::channel('mark_log')->info($exception->getTraceAsString());
        }
    }

    public function downloadS3Object(string $filePath)
    {
        try {
            $key = $filePath;
            $s3Client = Storage::disk('s3')->getClient();
            $response = $s3Client->getObject([
                'Bucket' => Config::get('filesystems.disks.s3.bucket'),
                'Key' => $key,
                'SaveAs' => $key,
            ]);
            return $response;
        } catch (Exception $exception) {
            Log::channel('mark_log')->info($exception->getTraceAsString());
        }
    }

    public function listS3Objects()
    {
        try {
            $s3Client = Storage::disk('s3')->getClient();
            $response = $s3Client->listObjects([
                'Bucket' => Config::get('filesystems.disks.s3.bucket')
            ]);
            return $response;
        } catch (Exception $exception) {
            Log::channel('mark_log')->info($exception->getTraceAsString());
        }
    }
}
