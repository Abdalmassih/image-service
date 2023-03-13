<?php
class ImageController extends Controller
{
    public function index($offset = 0, $count = 3)
    {

        $images = $this->model->findAll($offset, $count);

        $this->view('images/index', $images);
    }

    public function show(int $id)
    {
        $image = $this->model->find($id);
        $type = pathinfo(IMAGEPATH . $image->path, PATHINFO_EXTENSION);
        ini_set('memory_limit', '-1');

        if (
            isset($_GET['height'], $_GET['width']) &&
            is_numeric($_GET['height']) &&
            is_numeric($_GET['width']) &&
            $_GET['width'] > 0 &&
            $_GET['width'] > 0
        ) {
            $image2 = $this->model->resize(IMAGEPATH . $image->path, $_GET['width'], $_GET['height'], $_GET['crop'] ?? false);

            ob_start();

            imagejpeg($image2);
            $imageData = ob_get_contents();

            ob_end_clean();

            $image->base64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
        } else {
            $imageData = file_get_contents(IMAGEPATH . $image->path);
            $image->base64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
        }

        $this->view('images/show', $image);
    }
}