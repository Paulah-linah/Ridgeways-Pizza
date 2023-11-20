<?php

namespace backend\controllers;

use common\models\Size;
use common\models\SizeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SizeController implements the CRUD actions for Size model.
 */
class SizeController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Size models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SizeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Size model.
     * @param int $sizeId Size ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sizeId)
    {
        return $this->render('view', [
            'model' => $this->findModel($sizeId),
        ]);
    }

    /**
     * Creates a new Size model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Size();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sizeId' => $model->sizeId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Size model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sizeId Size ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sizeId)
    {
        $model = $this->findModel($sizeId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sizeId' => $model->sizeId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Size model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sizeId Size ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sizeId)
    {
        $this->findModel($sizeId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Size model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sizeId Size ID
     * @return Size the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sizeId)
    {
        if (($model = Size::findOne(['sizeId' => $sizeId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
