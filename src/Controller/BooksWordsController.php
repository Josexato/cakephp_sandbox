<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BooksWords Controller
 *
 * @property \App\Model\Table\BooksWordsTable $BooksWords
 *
 * @method \App\Model\Entity\BooksWord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksWordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Words', 'Books']
        ];
        $booksWords = $this->paginate($this->BooksWords);

        $this->set(compact('booksWords'));
    }

    /**
     * View method
     *
     * @param string|null $id Books Word id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booksWord = $this->BooksWords->get($id, [
            'contain' => ['Words', 'Books']
        ]);

        $this->set('booksWord', $booksWord);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booksWord = $this->BooksWords->newEntity();
        if ($this->request->is('post')) {
            $booksWord = $this->BooksWords->patchEntity($booksWord, $this->request->getData());
            if ($this->BooksWords->save($booksWord)) {
                $this->Flash->success(__('The books word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books word could not be saved. Please, try again.'));
        }
        $words = $this->BooksWords->Words->find('list', ['limit' => 200]);
        $books = $this->BooksWords->Books->find('list', ['limit' => 200]);
        $this->set(compact('booksWord', 'words', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Books Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booksWord = $this->BooksWords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booksWord = $this->BooksWords->patchEntity($booksWord, $this->request->getData());
            if ($this->BooksWords->save($booksWord)) {
                $this->Flash->success(__('The books word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The books word could not be saved. Please, try again.'));
        }
        $words = $this->BooksWords->Words->find('list', ['limit' => 200]);
        $books = $this->BooksWords->Books->find('list', ['limit' => 200]);
        $this->set(compact('booksWord', 'words', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Books Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booksWord = $this->BooksWords->get($id);
        if ($this->BooksWords->delete($booksWord)) {
            $this->Flash->success(__('The books word has been deleted.'));
        } else {
            $this->Flash->error(__('The books word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
