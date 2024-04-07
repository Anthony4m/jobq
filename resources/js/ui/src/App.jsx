import Navbar from "./components/Navbar.jsx";
import Hero from "./components/Hero.jsx";
import RecFilter from "./components/RecFilter.jsx";
import Listings from "./components/Listings.jsx";
import ContentPage from "./Pages/ContentPage.jsx";

function App() {

  return (
    <>
       <Navbar/>
        <Hero/>
        <RecFilter/>
        <ContentPage/>
    </>
  )
}

export default App
