
<div class="container">
	
</div>


<script>
	
	var hotel = {
		rooms: 6,
		occupyRoom: function() {
			if( this.rooms > 0 ) {
				this.rooms -= 1;
			} else {
				console.log("No vacancy");
			}
		},
		available: function() {
			return this.rooms;
		},

		addRoom: function(number) {
			return this.rooms += number;
		}
	}


hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();
hotel.occupyRoom();

console.log(hotel.available());


var addtionaRooms = 6;

function addRoom(addtionaRooms, callback) {
	return callback.apply(hotel, [addtionaRooms]);
} 

// function addRoom(addtionaRooms, callback) {
// 	return callback(addtionaRooms);
// }

// addRoom(addtionaRooms, hotel.addRoom);
addRoom(addtionaRooms, hotel.addRoom);

console.log(hotel.available());
</script>