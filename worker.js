
// ========================================================= //
//             				 IPA    			             //
// ========================================================= //

// set initial parameters' values
var population_size;
var dimension_size;
var donors_number;
var receivers_number;
var maximum_evaluations;
var run;
var	max_run;
var objective_function_name;
var bound = 100;
var best_fitness;
var lower_bound = -bound;
var upper_bound = bound;
var try_fun = 0;

self.addEventListener("message", function(e) {
    var args = e.data.args;
    if(args.method=="getparams"){
        population_size=parseInt( args.population_size);
        maximum_evaluations =parseInt(args.maximum_evaluations);
        dimension_size =parseInt(args.dimension_size);
        donors_number =parseInt(args.donors_number);
        receivers_number=parseInt(args.receivers_number);
        try_fun=parseInt(args.try_fun);
        max_run=parseInt(args.max_run);
        objective_function_name=args.objective_function_name;
        start_IPA();
    }
   
}, false);


// ========================================================= //
//              objective_function Functions                 //
// ========================================================= //

function writetable(){
    var div =  '<table class="table table-bordered col-sm-12" style="overflow:auto !important;" >'+
            '<thead>'+
            '<tr>'+
                '<th colspan="4" >'+try_fun+'. Execution  -   Chosen Parameters :</th>'+
            '</tr>'+
            '</thead>'+
            '<tbody>'+
            '<tr>'+
                '<td class="td1" >Population Size &#8594; '+population_size+'</td>'+
                '<td class="td1" >Dimension Size &#8594; '+dimension_size+'</td>'+
                '<td class="td1" >Donors Number &#8594; '+donors_number+'</td>'+
                '<td class="td1" >Receivers Number &#8594; '+receivers_number+'</td>'+
            '<tr>'+
                '<td class="td1" >Mximum Evaluations &#8594; '+maximum_evaluations+'</td>'+
                '<td class="td1" >Number Of Execution &#8594; '+max_run+'</td>'+
                '<td class="td1" >Bound &#8594; '+upper_bound+'</td>'+
                '<td class="td1" >Objective Function &#8594; '+objective_function_name+'</td>'+
            '</tbody>'+
        '</table>';
    return div ; 
}

//function selection control
function objective_function(objective_function,x){
    var text = "";
    switch(objective_function) {
        case "sphere":
			maximum_evaluations = 150000 ;
            return sphere(x);
            break;
        case "ackley":
			maximum_evaluations = 150000 ;
            return ackley(x);
            break;
        case "griewank":
             maximum_evaluations = 200000 ;
            return griewank(x);
            break;
        case "quartic":
             maximum_evaluations = 300000 ;
            return quartic(x);
            break;
        case "rastrigin":
             maximum_evaluations = 300000 ;
            return rastrigin(x);
            break;
        case "rosenbrock":
             maximum_evaluations = 500000 ;
            return rosenbrock(x);
            break;
        case "schwefel_2_22":
             maximum_evaluations = 200000 ;
            return schwefel_2_22(x);
            break;
        case "schwefel":
             maximum_evaluations = 200000 ;
            return schwefel(x);
            break;
        case "step":
             maximum_evaluations = 150000 ;
            return step(x);
            break;
        case "schwefel_1_22":
             maximum_evaluations = 500000 ;
            return schwefel_1_22(x);
            break;
        case "schwefel_1_21":
             maximum_evaluations = 500000 ;
            return schwefel_1_21(x);
            break;
        default:
            text = "error: objective_function not found";
    }
}


//bounds +/- 100
//maximum evaluations 150,000
function sphere(x){
    bound = 100 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    var total = 0 ;
    for (let index = 0; index < d ; index++) {
        total = total + ( x[index]*x[index]) ;        
    }
    return total ;  
}

//bounds +/- 32
//maximum evaluations 150,000
function ackley(x){
    bound = 32 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    a = 20;
    b = 0.2;
    c = 2 * Math.PI;
    sum1 = 0;
    sum2 = 0;
    for (let i = 0; i < d ; i++) {
        sum1 += (x[i] ** 2);
        sum2 += Math.cos(c * x[i]);
    }
    term1 = -a * Math.exp(-b * Math.sqrt(sum1 / d));
    term2 = -Math.exp(sum2 / d);
    return term1 + term2 + a + Math.exp(1);
}


//bounds +/- 600
//maximum evaluations 200,000
function griewank(x){
    bound = 600 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    total_prod = 1;
    for (let i = 0; i < d ; i++) {
        total_sum += ((x[i] ** 2) / 4000);
        total_prod *= Math.cos(x[i] / Math.sqrt(i + 1));   
    }
    return total_sum - total_prod + 1; 
}

//bounds +/- 1.28
//maximum evaluations 300,000
function quartic(x){
    bound = 1.28 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    for (let i = 0; i < d ; i++) {
        total_sum += i * (x[i] ** 4);      
    }
    return total_sum + Math.random(); 
}

//bounds +/- 5.12
//maximum evaluations 300,000
function rastrigin (x){
    bound = 5.12 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    for (let i = 0; i < d ; i++) {
        total_sum += ((x[i] ** 2) - (10 * Math.cos(2 * Math.PI * x[i])) + 10);  
    }
    return total_sum ;
}

//bounds +/- 30
//maximum evaluations 500,000
function rosenbrock(x){ 
    bound = 30 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    for (let i = 0; i < (d-1) ; i++) {
        total_sum += (100 * (x[i + 1] - (x[i] ** 2)) ** 2) + ((x[i] - 1) ** 2);
    }
    return total_sum ;
}

//bounds +/- 10
//maximum evaluations 200,000
function schwefel_2_22(x){ 
    bound = 10 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    total_prod = 1;
    for (let i = 0; i < d ; i++) {
        total_sum += Math.abs(x[i]);
        total_prod *= Math.abs(x[i]);
    }
    return total_sum ;
}

//bounds +/- 500
//maximum evaluations 300,000
function schwefel(x){ 
    bound = 500 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    total_prod = 1;
    for (let i = 0; i < d ; i++) {
        total_sum += x[i] * Math.sin( Math.sqrt( Math.abs( x[i] ) ) );
    }
    return -total_sum ;
}

//bounds +/- 100
//maximum evaluations 150,000
function step(x){ 
    bound = 100 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    for (let i = 0; i < d ; i++) {
        total_sum += ((Math.floor(x[i] + 0.5)) ** 2);
    }
    return total_sum ;
}


//bounds +/- 100
//maximum evaluations 500,000
function schwefel_1_22(x){ 
    bound = 100 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    var max_value = Math.abs(x[0]);
    for (let i = 1; i < d ; i++) {
        if(Math.abs(x[i]) > max_value){
            max_value = Math.abs(x[i]);
        }
    }
    return max_value ;
}

//bounds +/- 100
//maximum evaluations 500,000
function schwefel_1_21(x){ 
    bound = 100 ;
    lower_bound = -bound;
    upper_bound = bound;
    d = x.length;
    total_sum = 0;
    for (let i = 0; i < d ; i++) {
        inner_sum = 0;
        for (let j = 0; j < i ; j++) {
            inner_sum += x[j];
        }
        total_sum += inner_sum ** 2;
    }
    return total_sum ;
}


// ========================================================= //
//                        Functions                          //
// ========================================================= //

//generating the initial population
function generate_population(){
    var population = [];
    for (let index = 0; index < population_size; index++) {
        population.push(generate_individual());
    }
    return population;
}

//generating just one individual
function generate_individual(){
    var individual = [];
    for (let index = 0; index < dimension_size; index++) {
        individual.push(lower_bound + Math.random() * (upper_bound - lower_bound));
    }
    return individual;
}

//calculating fitness of all individuals in population
function calculate_fitnesses(population){
    fitnesses=[];
    for (let index = 0; index < population_size; index++) {
        fitnesses.push(fitness(population[index]));
    }
    return fitnesses;
}

function fitness(individual){
    return objective_function(this.objective_function_name,individual)
}

// perform infection between two individuals
function perform_infection(x_k, x_m){
    var j = Math.floor(Math.random()*100); 
    x_k[j] += ((Math.random() * 2) -1) * (x_k[j] - x_m[j])
    x_k[j] = check_bounds(x_k[j]);
    return x_k ;
}

// compare individual's fitness with global fitness value
function compare_with_best_fitness(x){
    var x_fitness = fitness(x);
    if (x_fitness < best_fitness){
        best_fitness = x_fitness;
    }
}

// get lists of indexes of doreceivers_numbers and recievers
function getindexes(size,ctrl,fitnesses){
    var fitnesses_tmp = fitnesses.slice(0);
    var array = [];
    var index = 0 ;
    for (let i = 0; i < size; i++) {
        if(ctrl == 1){
            index = fitnesses_tmp.indexOf(Math.min(...fitnesses_tmp));
        }else{
            index = fitnesses_tmp.indexOf(Math.max(...fitnesses_tmp));
        }
        array.push(index);
        fitnesses_tmp.splice(index, 1);
    }
    return array ;
}

// performing plasma tranfer from donor to receiver indvidual
function perform_plasma_transfer(receiver, donor){
    for (let j = 0; j < dimension_size ; j++) {
        receiver[j] += ((Math.random() * 2) -1) * (receiver[j] - donor[j])
        receiver[j] = check_bounds(receiver[j]);
    }
    return receiver;
}

// check if exceeded bounds
function check_bounds(x){    
    if (x > upper_bound){
        x = upper_bound;
    }else if (x < lower_bound){
        x = lower_bound;
    }
    return x;
}

//updating donor's parameters
function update_donor(donor){
    for (let j = 0; j < dimension_size ; j++){
        donor[j] += ((Math.random() * 2) -1) * donor[j]
        donor[j] = check_bounds(donor[j])
    }
    return donor;
}

function initial_array(size){
    var array = [];
    for (let i = 0; i < size; i++) {
        array.push(1);
    }
    return array;
}

// ========================================================= //
//                    Start of IPA                           //
// ========================================================= //


function start_IPA() {
	
    
    start_fitnesses= [];
    end_fitnesses= [];
    var ine = 0 ;
	run = 0 ;
	while(run < max_run){

        // set initial parameters' values
        population_size = this.population_size;
        dimension_size =this.population_size;
        donors_number = this.donors_number;
        receivers_number = this.receivers_number;
        max_run = this.max_run;
        current_evaluation =  population_size;
        
        maximum_evaluations = this.maximum_evaluations;

		//progress+=25;
		//$("#progress-bar").css("width",progress+"%");
		//$("#progress-bar").text(progress+"%");

		//generating initial population
		var population = generate_population();

		//calculating fitness of population
		var fitnesses = calculate_fitnesses(population);
        start_fitnesses.push(fitnesses.slice(0));
		//finding best individual fitness
		best_fitness = Math.min(...fitnesses);
            
		if(run < 1){
            postMessage("table_"+writetable(population_size,dimension_size,donors_number,receivers_number,max_run,maximum_evaluations,upper_bound,lower_bound));
            postMessage("max_"+maximum_evaluations);
		}
		run++;
        
		//console.log("Initial best fitness value:"+ best_fitness);
		//console.log("Number of parameters:"+ dimension_size);
		//console.log("Population size:"+ population_size);

		while(current_evaluation < maximum_evaluations){
            postMessage("progress_"+ine);
            
			//start of infection phase
			for (let index = 0; index < population_size ; index++) {
				if (current_evaluation < maximum_evaluations){
                    current_evaluation += 1;
                    ine++;
					var random_index = Math.floor(Math.random()*population_size); 
					while (random_index == index){
						random_index = Math.floor(Math.random()*population_size); 
					}
					current_individual = population[index].slice(0);
					random_individual = population[random_index].slice(0);
					var infected_individual = perform_infection(current_individual, random_individual);
                    var fitness_of_infected = fitness(infected_individual);
                    
					if(fitness_of_infected < fitnesses[index]){
						population[index] = infected_individual.slice(0);
						fitnesses[index] = fitness_of_infected;
						compare_with_best_fitness(infected_individual);
					}
				}else{break} // if exceeded maximum evaluation number
            }
            
			
			// start of plasma transfering phase
			// generating dose_control and treatment_control vectors
			var dose_control = initial_array(receivers_number);
			var treatment_control = initial_array(receivers_number);

			// get indexes of both of donors and receivers
			var donors_indexes = getindexes(donors_number,1,fitnesses);
			var receivers_indexes = getindexes(receivers_number,0,fitnesses);
		

			for(let i = 0; i < receivers_number ; i++){
				var receiver_index = receivers_indexes[i];
				var random_donor_index = donors_indexes[Math.floor(Math.random()*donors_number)];
				var current_receiver = population[receiver_index];
				var random_donor = population[random_donor_index];
				while (treatment_control[i] == 1){
					if(current_evaluation < maximum_evaluations){
                        current_evaluation += 1;
                        ine++;
						var treated_individual = perform_plasma_transfer(current_receiver, random_donor);
						var treated_fitness = fitness(treated_individual);
						if(dose_control[i] == 1){
							if(treated_fitness < fitnesses[random_donor_index]){
								dose_control[i] += 1;
								population[receiver_index] = treated_individual.slice(0);
								fitnesses[receiver_index] = treated_fitness;
							}else{
								population[receiver_index] = random_donor.slice(0);
								fitnesses[receiver_index] = fitnesses[random_donor_index];
								treatment_control[i] = 0;
							}
						}else{
							if(treated_fitness < fitnesses[receiver_index]){
								population[receiver_index] = treated_individual.slice(0);
								fitnesses[receiver_index] = treated_fitness;
							}else{
								treatment_control[i] = 0;
							}
						}
						compare_with_best_fitness(population[receiver_index])
					}else{break} // if exceeded maximum evaluation number
				}
            }
            
			// start of donors updating phase
			for(let i = 0; i < donors_number ; i++){
				if(current_evaluation < maximum_evaluations){
                    current_evaluation += 1;
                    ine++;
					donor_index = donors_indexes[i];
					if((current_evaluation / maximum_evaluations) > Math.random()){
						population[donor_index] = update_donor(population[donor_index]);
					}else{
						population[donor_index] = generate_individual();
					}
					fitnesses[donor_index] = fitness(population[donor_index])
					compare_with_best_fitness(population[donor_index])
				}else{break} //if exceeded maximum evaluation number
            }
            

		}
        end_fitnesses.push(fitnesses.slice(0));
    }

    
    postMessage("start-fit_"+JSON.stringify(start_fitnesses) );
    postMessage("end-fit_"+JSON.stringify(end_fitnesses) );
    postMessage("end_end");
}
