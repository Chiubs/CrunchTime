//import logo from './logo.svg';
import './App.scss';
import React from "react";
import { Login, Register } from "./Components/Login/index";
//import bg from "./CalendarMark.jpg";
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";

import ReactDOM from "react-dom";




//pages
import loginPage from "./Components/Login/login";
import fullCalendar from './Components/Calender/fullCalendar';
import  LoginView  from './Components/Login/LoginView'


class App extends React.Component {

  render() {

    return <Router>
      <Switch>
      <Route exact path="/" component={LoginView}/>
      <Route exact path="/calendar" component={fullCalendar}/>
      
      </Switch>
    </Router>

  }



  //   componentDidMount() {
  //     //Add .right by default
  //     this.rightSide.classList.add("right");
  //   }

  //   changeState() {
  //     const { isLogginActive } = this.state;

  //     if (isLogginActive) {
  //       this.rightSide.classList.remove("right");
  //       this.rightSide.classList.add("left");
  //     } else {
  //       this.rightSide.classList.remove("left");
  //       this.rightSide.classList.add("right");
  //     }
  //     this.setState(prevState => ({ isLogginActive: !prevState.isLogginActive }));
  //   }




  //   render() {
  //     const { isLogginActive } = this.state;
  //     const current = isLogginActive ? "Register" : "Login";
  //     const currentActive = isLogginActive ? "login" : "register";
  //     return (
  //       <div className="containerBG">

  //         <div className="App">
  //           <div className="login">
  //             <div className="container" ref={ref => (this.container = ref)}>
  //               {isLogginActive && (
  //                 <Login containerRef={ref => (this.current = ref)} />
  //               )}
  //               {!isLogginActive && (
  //                 <Register containerRef={ref => (this.current = ref)} />
  //               )}
  //             </div>
  //             <RightSide
  //               current={current}
  //               currentActive={currentActive}
  //               containerRef={ref => (this.rightSide = ref)}
  //               onClick={this.changeState.bind(this)}
  //             />
  //           </div>

  //         </div>
  //       </div>
  //     );
  //   }
  // }





  // const RightSide = props => {
  //   return (
  //     <div
  //       className="right-side"
  //       ref={props.containerRef}
  //       onClick={props.onClick}
  //     >
  //       <div className="inner-container">
  //         <div className="text">{props.current}</div>
  //       </div>
  //     </div>
  //   );
  // };
}

export default App;


