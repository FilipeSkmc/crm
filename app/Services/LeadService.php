<?php

namespace App\Services;

use App\Models\Lead;

class LeadService extends AbstractService implements ServiceInterface
{
  protected $entitiyName = 'Lead';

  protected $model = Lead::class;
}
