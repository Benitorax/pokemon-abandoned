import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useRouteMatch,
    useParams,
} from "react-router-dom";

export function Navbar(props) {
    function logout() {
        props.userDispatch({type: 'logout'});
    }

    return (
        <nav className="navbar is-primary">
            <div className="container">
                { props.user && props.user.username ? 
                    <>
                        <Link className="navbar-item has-text-white" to="/">Option</Link>  
                        <Link onClick={logout} className="navbar-item has-text-white" to="/logout">Log out</Link>
                    </> :
                    <>
                        <Link className="navbar-item has-text-white" to="/login">Log In</Link>
                        <Link className="navbar-item has-text-white" to="/signin">Sign In</Link>
                    </>
                }
            </div>  
        </nav>
    );
}