<?php 

namespace App\Controller;

class ArticlesController extends AppController{

    public function initialize():void{
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');

    }
     
    public function index(){
        $articles = $this->Paginator->paginate($this->Articles->find());
        $this->set(compact('articles'));

    }

    public function view($slug){
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function edit($id){
        $article = $this->Articles->findBySlug($id)->firstOrFail();
        if($this->request->is(['post','put'])){

            $this->Articles->patchEntity($article,$this->request->getData());
            if($this->Articles->save($article)){
                $this->Flash->success('Article successfully updated');
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('unable to update the article');
        }
        $this->set('article',$article);
    }

   

    public function add(){
        $article = $this->Articles->newEmptyEntity();

        if($this->request->is('post')){
            // echo "<pre>";print_r($this->request->getData());di../e;
            $article  = $this->Articles->patchEntity($article,$this->request->getData());
            $article->user_id = 1;

            if($this->Articles->save($article)){

                $this->Flash->success('Your Article Successfully created !');
                return $this->redirect(['action' => 'index']);
                
            }

            $this->Flash->error('Unable to add Article');
        }
        $this->set('article',$article);

    }

    public function delete($slug = null){
        // check if slug empty
        if(empty($slug))
        {
            $this->Flash->error('Article Not Found!');
            return $this->redirect(['action'=>'index']);
        }
        $this->request->allowMethod(['post','delete']);
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        if($this->Articles->delete($article)){
            $this->Flash->success('Articles successfully deleted');
            return $this->redirect(['action'=>'index']);
        }
        $this->Flash->error('Unable to delete the article');
        return $this->redirect(['action'=>'index']);
    }

   
}