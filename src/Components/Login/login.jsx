import React from "react"
import logImg from "../../CalendarMark.svg"
import { Link } from "react-router-dom";
import { Register } from "./index";

export class Login extends React.Component {

  constructor(props) {
    super(props);
    this.state = {
      isLogginActive: true
    };
  }

  render() {
    return <div className="base-container" ref={this.props.containerRef}>
      <div className="header">Login</div>
      <div className=" content ">
        <div className="image">
          <img src={logImg} />
        </div>
        <div className="form">
          <div className="form-group">
            <label htmlFor="username">Username</label>
            <input type="text" name="username" placeholder="username" />
          </div>
          <div className="form-group">
            <label htmlFor="password">Password</label>
            <input type="password" name="password" placeholder="password" />
          </div>
        </div>
      </div>
      <div className="footer">
        {/* { <Link to = "/calendar">  */}
        <button type="button" className="btn">
          Login

                </button>
        {/* </Link> */}
        {/* } */}
      </div>
    </div>
  }

  // componentDidMount() {
  //   //Add .right by default
  //   this.rightSide.classList.add("right");
  // }

  // changeState() {
  //   const { isLogginActive } = this.state;

  //   if (isLogginActive) {
  //     this.rightSide.classList.remove("right");
  //     this.rightSide.classList.add("left");
  //   } else {
  //     this.rightSide.classList.remove("left");
  //     this.rightSide.classList.add("right");
  //   }
  //   this.setState(prevState => ({ isLogginActive: !prevState.isLogginActive }));
  // }




  // render() {
  //   const { isLogginActive } = this.state;
  //   const current = isLogginActive ? "Register" : "Login";
  //   const currentActive = isLogginActive ? "login" : "register";
  //   return (
  //     <div className="containerBG">

  //       <div className="App">
  //         <div className="login">
  //           <div className="container" ref={ref => (this.container = ref)}>
  //             {isLogginActive && (
  //               <Login containerRef={ref => (this.current = ref)} />
  //             )}
  //             {!isLogginActive && (
  //               <Register containerRef={ref => (this.current = ref)} />
  //             )}
  //           </div>
  //           <RightSide
  //             current={current}
  //             currentActive={currentActive}
  //             containerRef={ref => (this.rightSide = ref)}
  //             onClick={this.changeState.bind(this)}
  //           />
  //         </div>

  //       </div>
  //     </div>
  //   );
  // }
}
const RightSide = props => {
  return (
    <div
      className="right-side"
      ref={props.containerRef}
      onClick={props.onClick}
    >
      <div className="inner-container">
        <div className="text">{props.current}</div>
      </div>
    </div>
  );
};




export default Login;