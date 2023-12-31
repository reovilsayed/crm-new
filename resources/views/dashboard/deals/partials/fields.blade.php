<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome back!</h4>
            <span>Element</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
        </ol>
    </div>
</div>

<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">

        
            @if(isset($deal))
                @include('partials.form.select', [
                    'name' => 'client_id',
                    'label' => 'Customer',
                    'options' => $clients,
                    'value' => old('client_id', isset($deal) ? $deal->client->id : null),
                ])  
            
            @else
            @include('partials.form.dynamicSelect', [
                'name' => 'client_id',
                'label' => 'Customer',
                'options' => $clients,
                'value' => old('client_id', isset($deal) ? $deal->client->id : null),
            ])
            @endif
 
        
            @if(isset($deal))
               @include('partials.form.select', [
                   'name' => 'organisation_id',
                   'label' => 'Organisation',
                   'options' => $organisations,
                   'value' => old('organisation_id', isset($deal) ? $deal->organisation->id : null),
               ])  
           
           @else
           @include('partials.form.dynamicSelect', [
               'name' => 'organisation_id',
               'label' => 'Organisation',
               'options' => $organisations,
               'value' => old('organisation_id', isset($deal) ? $deal->organisation->id : null),
           ])
           @endif
         
            @include('partials.form.text', [
                'name' => 'title',
                'label' => 'Title',
                'value' => old('title', $deal->title ?? null),
            ])
            @include('partials.form.textarea', [
                'name' => 'description',
                'label' => 'Description',
                'rows' => 5,
                'value' => old('description', $deal->description ?? null),
            ])

            <div class="row">
                <div class="col-sm-6">
                    @include('partials.form.text', [
                        'name' => 'amount',
                        'label' => 'Value',
                        'value' => old('amount', $deal->amount ?? null),
                    ])
                </div>
                <div class="col-sm-6">
                    @include('partials.form.select', [
                        'name' => 'currency',
                        'label' => 'Currency',
                        'options' => App\Helper\SelectOptions::currencies(),
                        'value' => old('currency', $deal->currency ?? 'USD'),
                    ])
                </div>
            </div>
            @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                  'options' => App\Helper\SelectOptions::labels(),
                 'value' => old('labels', isset($deal) ? $deal->label : null),
            ])

            @include('partials.form.select', [
                'name' => 'user_owner_id',
                'label' => 'owner',
                'options' => App\Helper\SelectOptions::users(false),
                'value' => old('user_owner_id', $deal->user_owner_id ?? auth()->user()->id),
            ])
        </div>
        <div class="col-sm-6">
            <h6 class="text-uppercase"><span class="fa fa-user" aria-hidden="true"></span> Person</h6>
            <hr />
            <span class="autocomplete-person">
              
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'email',
                            'label' => 'Email',
                            'value' => old('email', $deal->email ?? null),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'phone',
                            'label' => 'Phone',
                            'value' => old('phone', $deal->phone ?? null),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
     
                </div>
            </span>
            <h6 class="text-uppercase mt-4"><span class="fa fa-building" aria-hidden="true"></span> Organization </h6>
            <hr />
            <span class="autocomplete-organisation">
                {{-- @include('laravel-crm::partials.form.text',[
                    'name' => 'address',
                    'label' => ucfirst(__('laravel-crm::lang.address')),
                    'value' => old('address', $address ?? null)
                ]) --}}
                @include('partials.form.text', [
                    'name' => 'address',
                    'label' => 'Address',
                    'value' => old('address', $deal->address ?? null),
                    //    'attributes' => [
                    //              'disabled' => 'disabled'
                    //          ]
                ])
                {{-- @include('partials.form.text', [
                    'name' => 'line2',
                    'label' => 'Address line 2',
                    'value' => old('line2', $address->line2 ?? null),
                    //    'attributes' => [
                    //              'disabled' => 'disabled'
                    //          ]
                ])
                @include('partials.form.text', [
                    'name' => 'line3',
                    'label' => 'address line 3',
                    'value' => old('line3', $address->line3 ?? null),
                    //    'attributes' => [
                    //              'disabled' => 'disabled'
                    //          ]
                ]) --}}
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'city',
                            'label' => 'City',
                            'value' => old('city', $deal->city ?? null),
                            // 'attributes' => [
                            //     'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'state',
                            'label' => 'state',
                            'value' => old('state', $deal->state ?? null),
                            //    'attributes' => [
                            //              'disabled' => 'disabled'
                            //     ]
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @include('partials.form.text', [
                            'name' => 'code',
                            'label' => 'Post code',
                            'value' => old('code', $deal->post_code ?? null),
                            // 'attributes' => [
                            //  'disabled' => 'disabled'
                            // ]
                        ])
                    </div>
                    <div class="col-sm-6">
                        @include('partials.form.select', [
                            'name' => 'country',
                            'label' => 'Country',
                            'options' => App\Helper\SelectOptions::countries(),
                            'value' => old('country', $deal->country ?? 'United States'),
                            //  'attributes' => [
                            //      'disabled' => 'disabled'
                            //  ]
                        ])
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
