{{-- @dd( $organisation->post_code); --}}
<div class="card p-4">
    <div class="row">
        <div class="col-sm-6 border-right">
             <div class="d-flex align-items-center">
                <div class="col-md-10">
                    @include('partials.form.select', [
                        'name' => 'client_id',
                        'label' => 'Customer',
                        'options' => $clients,
                      
                    ])
                </div>
                <div class="col-md-2 ms-2 mt-2">
                    <button type="button" class="btn btn-dark btn-sm showmodal" data-show-modal="clientModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            @include('partials.form.text', [
                'name' => 'name',
                'label' => 'Name',
                'attributes'=>[
                    'required'=>true,
                ]

            ])
            @include('partials.form.select', [
                'name' => 'label',
                'label' => 'Label',
                'options' => App\Helper\SelectOptions::labels(),
   
            ])
            @include('partials.form.text', [
                'name' => 'meta[street]',
                'label' => 'Street address',
      
            ])
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[place]',
                        'label' => 'Place',
                       
                    ])
                </div>
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[post_code]',
                        'label' => 'Zip',
                   
                    ])
                </div>
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[state]',
                        'label' => 'State',
                   
                    ])
                </div>
                <div class="col-sm-12">
                    @include('partials.form.select', [
                        'name' => 'meta[country]',
                        'label' => 'Country',
                        'options' => $countries,
                        
                    ])
                </div>
            </div>
        

        </div>
        <div class="col-sm-6">


            {{-- <h6 class="text-uppercase"><span class="fa fa-user" aria-hidden="true"></span> Company Info</h6>
            <hr />
            <span class="autocomplete-person"> --}}
                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[company_email]',
                        'label' => 'Email',
              
                    ])
                </div>

                <div class="col-sm-12">
                    @include('partials.form.text', [
                        'name' => 'meta[company_phone]',
                        'label' => 'Phone',
                   
                    ])
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_twitter]',
                            'label' => 'X/Twitter Profile',
                
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_tiktok]',
                            'label' => 'Tiktok Profile',
                        
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_youtube]',
                            'label' => 'Youtube profile',
           
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[company_fb]',
                            'label' => 'Facebook profile',
                 
                        ])
                    </div>
                    <div class="col-sm-12">
                        @include('partials.form.text', [
                            'name' => 'meta[niche]',
                            'label' => 'Niche',

                        ])
                    </div>




                </div>





        </div>
        <div class="col-sm-12 d-flex justify-content-between">
            <p class="text-primary">Add other social url</p>
            <button type="button" class="btn btn-secondary btn-sm py-2" id="addColumnButton"><i
                    class="fas fa-plus"></i></button>
        </div>
        <div class="row clientRow" id="">
    
          

        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var columnCounter = 0;

    $('#addColumnButton').on('click', function() {
        columnCounter += 1;

        $('.clientRow').each(function() {
            for (var i = 0; i < 1; i++) {
                var newRow =`
                <div class="row clientNewRow align-items-center">
                <div class="col-md-5">
                @include('partials.form.text', [
                    'name' => 'meta[social][${columnCounter-1}][name]',
                    'label' => 'Social name',
                ])
                </div>
                <div class="col-md-5">
                        @include('partials.form.text', [
                            'name' => 'meta[social][${columnCounter-1}][url]',
                            'label' => 'Social Url',
                        ])
                    </div>
                    <div class="col-md-2">
                  <button class="btn btn-danger btn-sm deleteNewRow" type="button"><i class="fas fa-trash"></i></button>
                 </div>
                 </div>
                        `;

            }
            $('.clientRow').append(newRow);
        });
        $('.clientRow').on('click','.deleteNewRow', function () {
        // $(this).closest('.clientRow').remove();
        $(this).closest('.clientNewRow').remove();
    });
    });

    // $('#addColumnButton').on('click', function () {
    //     columnCounter += 1;

    //     var newRow = `
    //         <div class="row clientNewRow align-items-center">
    //             <div class="col-md-5">
    //                 @include('partials.form.text', [
    //                     'name' => 'meta[social][${columnCounter}][name]',
    //                     'label' => 'Social name',
    //                 ])
    //             </div>
    //             <div class="col-md-5">
    //                 @include('partials.form.text', [
    //                     'name' => 'meta[social][${columnCounter}][url]',
    //                     'label' => 'Social Url',
    //                 ])
    //             </div>
    //             <div class="col-md-2">
    //                 <button class="btn btn-danger btn-sm deleteNewRow" type="button"><i class="fas fa-trash"></i></button>
    //             </div>
    //         </div>`;

    //     $('.clientRow').append(newRow);
    // });


</script>
