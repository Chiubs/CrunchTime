import React, {Component} from 'react';
import FullCalendar from "@fullcalendar/react"
import daygridPlugin from "@fullcalendar/daygrid"
import interactionPlugin from "@fullcalendar/interaction"


const handledateClick = (dateClickInfo: any) =>{

  console.log(dateClickInfo.dateStr);
 }

class fullCalendar extends React.Component {
 
 render(){
 return (
   <div>
        <FullCalendar

             plugins = {[daygridPlugin, interactionPlugin]}
            dateClick = {handledateClick}
            initialView = "dayGridMonth"
            selectable: true;

          />

</div>
 )


 }
}

export default fullCalendar;

