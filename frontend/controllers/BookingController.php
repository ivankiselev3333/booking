<?php

namespace frontend\controllers;

use app\models\Categories;
use app\models\Leads;
use app\models\Rooms;
use Yii;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * BookingController implements the CRUD actions for Rooms model.
 */
class BookingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                //'only' => ['index', 'activities'],
                'rules' => [
                  [
                    'actions' => ['index', 'get-categories', 'save'],
                    'allow' => true,
                    'roles' => ['@', '?'],
                  ],
                ],
              ],
        ];
    }

    /**
     * Lists all Rooms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $modelLeads = new Leads();
       // $modelRooms = new Rooms();
        $today = date('Y-m-d H:i:s');
        $connection = Yii::$app->getDb();
        $sql = "SELECT 
            c.title, 
            r.id, 
            COUNT(*) as cnt
            FROM rooms r 
            LEFT JOIN categories c 
            on r.category_id = c.id 
            WHERE r.id NOT IN (SELECT room_id FROM leads WHERE leads.date_out >= '$today')
            GROUP BY r.category_id;";
        $command = $connection->createCommand($sql);
        $leads = $command->queryAll();
   
        $connection = Yii::$app->getDb();
        $sql = "select c.title, r.category_id, count(*) as cnt from rooms r left join categories c on r.category_id = c.id group by category_id";
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();


        if ($modelLeads->load(Yii::$app->request->post())) {

            $postData = Yii::$app->request->post();

            if ($modelLeads->load($postData)) {
                if (!$modelLeads->save()) {
                    print_r($modelLeads->getErrors());
                } else {
                    Yii::$app->getSession()->setFlash('success', 'Your message has been successfully recorded.');
                    return Yii::$app->response->redirect('http://booking/frontend/web/booking/index')->send();
                }
            }
        }

        return $this->render('index',
            [
                'modelLeads' => $modelLeads,
                'today'=>$today,
            ]);


    }

    public function actionGetCategories()
    {
        Yii::$app->response->format = 'json';
        $dateIn = !empty($_POST['date_in']) ? $_POST['date_in'] : null;

        $sql = "SELECT 
            c.title, 
            r.id, 
            COUNT(*) as cnt
            FROM rooms r 
            LEFT JOIN categories c 
            on r.category_id = c.id 
            WHERE r.id NOT IN (SELECT room_id FROM leads WHERE leads.date_out >= '$dateIn')
            GROUP BY r.category_id;";

        
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);

        return $command->queryAll();

    }

    public function actionSave()
    {
        Yii::$app->response->format = 'json';
        if(!count($_POST)) {
            return ['error' => 'Нет данных формы'];
        }

        $post = (object) $_POST;

        $lead = new Leads();
        $lead->room_id = htmlentities($post->room_id,ENT_QUOTES, 'UTF-8');
        $lead->user_name = htmlentities($post->user_name,ENT_QUOTES, 'UTF-8');
        $lead->email = htmlentities(filter_var($post->email,FILTER_SANITIZE_EMAIL),ENT_QUOTES, 'UTF-8');
        $lead->date_in = htmlentities($post->date_in,ENT_QUOTES, 'UTF-8');
        $lead->date_out =  htmlentities($post->date_out,ENT_QUOTES, 'UTF-8');

        if(!$lead->save()) {
            return ['error' => $lead->errors];
        }

        return ['success' => 'OK'];
    }


}
