<?php

namespace backend\controllers;

use common\models\Pizza;
use common\models\PizzaSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PizzaController implements the CRUD actions for Pizza model.
 */
class PizzaController extends Controller
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
     * Lists all Pizza models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PizzaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pizza model.
     * @param int $pizzaId Pizza ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pizzaId)
    {
        return $this->render('view', [
            'model' => $this->findModel($pizzaId),
        ]);
    }

    /**
     * Creates a new Pizza model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pizza();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->pizzaImageFile = UploadedFile::getInstance($model, 'pizzaImageFile');

            $uploadPath = 'uploads/';

            if (!file_exists($uploadPath)) {

                mkdir($uploadPath, 0755, true); // Create the directory with permissions 0755
            }
            if ($model->validate()) {
                if ($model->pizzaImageFile) {
                    $filePath = $uploadPath . $model->pizzaImageFile->baseName . '.' . $model->pizzaImageFile->extension;

                    if ($model->pizzaImageFile->saveAs($filePath)) {
                        // Update the model's pizzaImage attribute with the file path
                        $model->pizzaImage = $filePath; // Assuming 'pizzaImage' is the attribute in the Pizza model for storing the image path
                    } else {
                        Yii::error('Failed to save the uploaded file.');
                        // Handle the case where the file couldn't be saved
                    }
                } else {
                    Yii::error('No file uploaded.');
                    // Handle the case where no file is uploaded
                }

                // Save the model with the updated image path
                if ($model->save(false)) {
                    return $this->redirect(['view', 'pizzaId' => $model->pizzaId]);
                } else {
                    Yii::error('Failed to save the model.');
                    // Handle the case where the model couldn't be saved
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pizza model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pizzaId Pizza ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pizzaId)
    {
        $model = $this->findModel($pizzaId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pizzaId' => $model->pizzaId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pizza model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pizzaId Pizza ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pizzaId)
    {
        $this->findModel($pizzaId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pizza model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pizzaId Pizza ID
     * @return Pizza the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pizzaId)
    {
        if (($model = Pizza::findOne(['pizzaId' => $pizzaId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
