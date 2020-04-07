import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useRouteMatch,
    useParams
} from "react-router-dom";
import ErrorBoundary from '../../Error/ErrorBoundary';
import SignIn from './SignIn';

export default function Homepage() {
    return (
        <>
            <ErrorBoundary>
                <section className="section">
                    <div className="container">
                        <Switch>
                            <Route path="/login">
                                <Login />
                            </Route>
                            <Route path="/sign-in">
                                <SignIn />
                            </Route>
                            <Route>
                                <div className="columns">
                                    <button className="button is-horizontal-center">
                                        <Link className="navbar-item" to="/login">Log in</Link>
                                    </button>
                                </div>
                                <div className="columns">
                                    <button className="button is-horizontal-center">
                                        <Link className="navbar-item" to="/sign-in">Sign in</Link>
                                    </button>
                                </div>
                            </Route>
                        </Switch>
                    </div>
                </section>
            </ErrorBoundary>
        </>
    );
}

function Login() {
    return (
        <>
            <div>Login</div>
            <Link className="navbar-item" to="/">Return</Link>
        </>
    );
}
