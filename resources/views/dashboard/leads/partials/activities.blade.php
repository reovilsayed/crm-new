<div class="row">
    <div class="col-md-12">
        @include('partials.form.text', [
            'name' => 'title',
            'label' => 'Title',
        ])
    </div>
    <div class="col-md-6">
        @include('partials.form.text', [
            'name' => 'from',
            'label' => 'From',
        ])
    </div>
    <div class="col-md-6">
        @include('partials.form.text', [
            'name' => 'to',
            'label' => 'To',
        ])
    </div>

    <div class="col-md-6">
        @include('partials.form.select',[
            'name' => 'guests',
            'label' => 'Guest',
            'options' => $persons,      
         
          ])
    </div>
    <div class="col-md-6">
        @include('partials.form.text', [
            'name' => 'location',
            'label' => 'Location',
        ])
    </div>
    <div class="col-md-12">
        @include('partials.form.textarea', [
            'name' => 'description',
            'label' => 'Description',
            'rows' => 5,
        ])
    </div>
</div>