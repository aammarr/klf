<template>
    <div class="col-md-12">
      <div>
       <b-container class="bv-example-row">
        <b-row>
          <b-card-group deck class="mb-3">
            <b-col class="col-md-3"><b-card bg-variant="primary"
                text-variant="white"
                header="Users"
                class="text-center">
            <p class="card-text">
              <a href="/users" >
                <button class="btn btn-primary"> Users </button>
              </a>
            </p>
        </b-card></b-col>
            <b-col class="col-md-3"><b-card bg-variant="secondary"
                text-variant="white"
                header="Events"
                class="text-center">
            <p class="card-text">
              <a href="/events" >
                <button class="btn btn-secondary"> Events </button>
              </a>
            </p>
        </b-card></b-col>
            <b-col class="col-md-3"> <b-card bg-variant="success"
                text-variant="white"
                header="Speakers"
                class="text-center">
            <p class="card-text">
              <a href="/speakers" >
                <button class="btn btn-success"> Speakers </button>
              </a>
            </p>
        </b-card></b-col>
        </b-card-group>
        </b-row>
       </b-container>  
      
        
        
       
      
      <b-card-group deck class="mb-3">
        <b-card bg-variant="info"
                text-variant="white"
                header="Sponsors"
                class="text-center">
            <p class="card-text">
              <a href="/sponsors" >
                <button class="btn btn-info"> Sponsors </button>
              </a>
            </p>
        </b-card>
        <b-card bg-variant="warning"
                text-variant="white"
                header="Prize & Awards"
                class="text-center">
            <p class="card-text">
              <a href="/prizes" >
                <button class="btn btn-warning"> Prize & Awards </button>
              </a>
            </p>
        </b-card>
        <b-card bg-variant="danger"
                text-variant="white"
                header="About"
                class="text-center">
            <p class="card-text">
              <a href="/about" >
                <button class="btn btn-danger"> About </button>
              </a>
            </p>
        </b-card>
    </b-card-group>
</div>


        <div class="col-md-4">
          <div class="form-group" >
		        <a href="/users" >
            	<button class="btn btn-primary"> Users </button>
          	</a>
		      </div>
          <div class="form-group">
            <a href="/speakers" >
              <button class="btn btn-primary"> Speakers </button>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
		        <a href="/events" >
            	<button class="btn btn-primary"> Events </button>
          	</a>
	        </div>
          <div class="form-group">
	         <a href="/sponsors" >
            	<button class="btn btn-primary"> Sponsors </button>
          	</a>
    	    </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
		        <a href="/prizes" >
            	<button class="btn btn-primary"> Prize & Awards </button>
          	</a>
	   	    </div>
          <div class="form-group">
		        <a href="/about" >
            	<button class="btn btn-primary"> About </button>
          	</a>
  		    </div>
        </div>     
    </div>
</template>

<script>
export default {
    
}
</script>