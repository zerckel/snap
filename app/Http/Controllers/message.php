<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Mail\sendMessage;
use App\messages;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class message extends Controller
{
    private $name;
    private $mail;
    private $object;
    private $message;
    private $pathUrl;
    private $code;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object): void
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getPathUrl()
    {
        return $this->pathUrl;
    }

    /**
     * @param mixed $pathUrl
     */
    public function setPathUrl($pathUrl): void
    {
        $this->pathUrl = $pathUrl;
    }

    public function showForm()
    {
        return view('index', ['code' => '']);
    }

    public function getInfo (Request $request){


        $this->setName($request->get('name'));
        $this->setMail($request->get('mail'));
        $this->setMessage($request->get('message'));
        $this->setPathUrl($request->get('img'));
        $this->setObject($request->get('object'));

        if ($this->getMail() === null || $this->getName() ){
            header("Location: http://127.0.0.1:8000/error");
            exit();
        }else{
            $this->insertMessage();
        }

    }

    public function insertMessage()
    {
        $code = Str::random(60);

        $this->setCode($code);

        DB::insert('insert into messages (message, code, photo_url) values (?, ?, ?)', [$this->getMessage(), $code, $this->getPathUrl()]);

        $this->sendMail();
    }

    public function sendMail()
    {
        Mail::to($this->getMail())->send(new sendMessage($this->getMessage(), $this->getName(), $this->getMail(), $this->getObject(), $this->getCode()));

        header("Location: http://127.0.0.1:8000/");
        exit();
    }

}
