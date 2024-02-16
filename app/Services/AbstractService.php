<?php

namespace App\Services;

use App\Http\Requests\AbstractRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class AbstractService
{
  /**
   * Nome da Entidade buscada, usada para tratamento de erros
   */
  protected $entityName = 'Entidade';

  /**
   * Nome da Model que está executando o CRUD
   */
  protected $model;

  /**
   * Atributos necessários para o CRUD
   */
  protected $attributes = [];

  /**
   * Entidade encontrada
   */
  protected $entity;

  /**
   * Recuperar dados por paginação ou sem
   */
  public function index(Request $request): array
  {
    $query = $this->model::builderQuery($request, $this->model);

    $data = $request->filled('page') ? $query->paginate($request->rowsPerPage ?? 10) : $query->get();

    return $data->toArray();
  }

  /**
   * Encontrar entidade pelo id
   */
  public function find(Request $request, $id): AbstractService
  {
    $this->entity = $this->model::builderQuery($request, $this->model)->findOrFail($id);

    return $this;
  }

  /** Exibir a entidade */
  public final function show(): array
  {
    return $this->entity->toArray();
  }

  /**
   * Inserindo nova entidade
   */
  public function store(AbstractRequest $request)
  {
    $this->getAttributes($request);

    return $this->model::create($this->attributes);
  }

  /**
   * Atualizando uma entidade
   */
  public function update(AbstractRequest $request)
  {
    $this->getAttributes($request);

    if ($this->entity->update($this->attributes)) {
      return $this->attributes;
    }

    throw new HttpResponseException(response()->json([
      'success' => false,
      'messages' => ["Não foi possível atualizar {$this->entityName}"],
      'data' => []
    ]), 400);
  }

  /**
   * Removendo uma entidade
   */
  public function delete()
  {
    if ($this->entity->delete()) {
      $this->entity->toArray();
    }

    throw new HttpResponseException(response()->json([
      'success' => false,
      'messages' => ["Não foi possível remover {$this->entityName}"],
      'data' => []
    ]), 400);
  }

  /**
   * obtendo os attributos da requisição
   */
  private function getAttributes(AbstractRequest $request)
  {
    $this->attributes = $request->all();
  }
}
