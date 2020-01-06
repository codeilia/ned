<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 10/20/2017
 * Time: 10:56 PM
 */

namespace App\Nedsa;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Response;

/**
 * Class Respondable
 * @package App\Art\Traits
 */
trait Respondable
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

//    public function respondDynamically($model, $notFoundMessage)
//    {
//        if ($model->isEmpty())
//            return $this->respondNotFound($notFoundMessage);
//    }


    public function respondSuccess($message = null)
    {
        if (empty($message))
            return $this->setStatusCode(204)->respond();

        return $this->setStatusCode(200)->respond([
            'message' => $message,
            'statusCode' => $this->getStatusCode()
        ]);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function respondWithData($data)
    {
        return $this->setStatusCode(200)->respond([
            'data' => $data,
            'statusCode' => $this->getStatusCode()
        ]);
    }


    /**
     * @param $data
     * @return mixed
     */
    /*
    public function respondWithCursorPagination($data)
    {
        $paginator = new CursorPaginator;

        $data = [
            'statusCode' => $this->getStatusCode(),
            'paginator' => [
                'cursor' => [
                    'after' => $paginator->after(),
                    'before' => $paginator->before(),
                    'nextURL' => $paginator->nextURL(),
                    'previousURL' => $paginator->previousURL(),
                ]
            ],
            'data' => $data
        ];

        return $this->respond($data);
    }
    */


    /**
     * @param Paginator|CustomPaginator $items
     * @param $data
     * @return mixed
     */
    public function respondWithPagination(Paginator $items, $data)
    {
        $data = array_merge([
            'statusCode' => $this->getStatusCode(),
            'paginator' => [
                'totalPages' => ceil($items->total() / $items->perPage()),
                'currentPage' => $items->currentPage(),
                'prevPage' => $items->previousPageUrl(),
                'nextPage' => $items->nextPageUrl(),
                'lastPage' => $items->lastPage(),
                'totalCount' => $items->total(),
                'limit' => (integer) $items->perPage(),
                'count' => $items->count()
            ]
        ], $data);

        return $this->respond($data);
    }
    
    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'موردی یافت نشد!')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param array $messages
     * @return mixed
     */
    public function respondValidationFailed($messages = [])
    {
        return $this->setStatusCode(422)->respondWithError($messages);
    }

    public function respondNotAuthorized($message = 'متاسفیم شما وارد نشده اید یا دسترسی لازم را ندارید')
    {
        return $this->setStatusCode(401)->respondWithError($message);
    }

    public function respondBadRequest($message = 'درخواست شما معتبر نیست', $errorCode = null)
    {
        return $this->setStatusCode(400)->respondWithError($message, $errorCode);
    }


    /**
     * @param $message
     * @param array $data
     * @return mixed
     */
    public function respondCreated($message = 'آیتم مورد نظر با موفقیت ایجاد شد', $data = [])
    {
        return $this->setStatusCode(201)->respond([
            'data' => $data,
            'message' => $message,
            'statusCode' => $this->getStatusCode()
        ]);
    }

    public function respondUpdated($message = 'آیتم مورد نظر با موفقیت بروز شد', $data = [])
    {
        return $this->setStatusCode(200)->respond([
            'data' => $data,
            'message' => $message,
            'statusCode' => $this->getStatusCode()
        ]);
    }

    public function respondDeleted($message = 'آیتم مورد نظر با موفقیت حذف شد', $data = [])
    {
        return $this->setStatusCode(200)->respond([
            'data' => $data,
            'message' => $message,
            'statusCode' => $this->getStatusCode()
        ]);
    }

    public function respondUploaded($filePath)
    {
        return $this->setStatusCode(201)->respond([
            'filePath' => $filePath,
            'statusCode' => $this->getStatusCode()
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'متاسفیم مشکل داخلی پیش آمد!')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param $message
     * @return mixed
     */
    public function respondForbidden($message = 'متاسفیم شما دسترسی لازم برای انجام اینکار را ندارید')
    {
        return $this->setStatusCode(403)->respondWithError($message);
    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data = [], $headers = [])
    {
//        $data = array_merge([
//            'statusCode' => $this->getStatusCode()
//        ], $data);

        $responseTime = microtime(true) - LARAVEL_START;

        $data = array_add($data, 'responseTime', $responseTime);

        return Response::json($data, $this->getStatusCode(), [
//            "Access-Control-Allow-Origin" => ["*"],
//            "Access-Control-Allow-Methods" =>  ["*"],
////            "Access-Control-Allow-Credentials" => ["true"],
////            "Access-Control-Expose-Headers" =>  ["Access-Control-*"],
//            "Access-Control-Allow-Headers" => ["Access-Control-*, Origin, X-Requested-With, Content-Type, Accept"],
//            "Allow" => ["GET, POST, PUT, DELETE, OPTIONS, HEAD"]
        ]);
    }

    /**
     * @param $message
     * @param null $errorCode
     * @return mixed
     */
    public function respondWithError($message, $errorCode = null)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'statusCode' => $this->getStatusCode(),
                'errorCode' => $errorCode
            ]
        ]);
    }

    public function stringifyResponse($response)
    {
        return json_encode($response->getOriginalContent());
    }
}
