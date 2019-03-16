<?php

namespace App\Admin\Controllers;

use App\Encuesta;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EncuestaController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Encuesta);

        $grid->id('Id');
        $grid->encuestaType_id('EncuestaType id');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->name('Name');
        $grid->preguntas()->display(function ($preguntas) {

            $preguntas = array_map(function ($pregunta) {
                return "<span class='label label-success'>{$pregunta['description']}</span>";
            }, $preguntas);

            return join('&nbsp;', $preguntas);
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Encuesta::findOrFail($id));

        $show->id('Id');
        $show->encuestaType_id('EncuestaType id');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->name('Name');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Encuesta);

        $form->number('encuestaType_id', 'EncuestaType id');
        $form->text('name', 'Name');

        return $form;
    }
}
