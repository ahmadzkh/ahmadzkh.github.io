import { useEffect, useState } from "react";
import { content, Lang } from "./data/content";
import Aurora from "./components/reactbits/Aurora";
import SplitText from "./components/reactbits/SplitText";
import SpotlightCard from "./components/reactbits/SpotlightCard";
import { Mail, Phone, MapPin, Download, ArrowRight } from "lucide-react";

const GithubIcon = () => (
  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
  </svg>
);
const LinkedinIcon = () => (
  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
  </svg>
);
const InstagramIcon = () => (
  <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
  </svg>
);

function useLang() {
  const [lang, setLang] = useState<Lang>("en");
  useEffect(() => { document.documentElement.lang = lang; }, [lang]);
  return { lang, setLang, t: content[lang] };
}

function Navbar({ lang, setLang, t }: { lang: Lang; setLang: (l: Lang) => void; t: any }) {
  const [scrolled, setScrolled] = useState(false);
  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <nav className={`navbar ${scrolled ? "navbar-scrolled" : ""}`}>
      <a href="#home" className="navbar-brand">AZH</a>
      <ul className="nav-links">
        <li><a href="#home">{t.nav.home}</a></li>
        <li><a href="#about">{t.nav.about}</a></li>
        <li><a href="#projects">{t.nav.projects}</a></li>
        <li><a href="#skills">{t.nav.skills}</a></li>
        <li><a href="#certificates">{t.nav.certificates}</a></li>
        <li><a href="#contact">{t.nav.contact}</a></li>
      </ul>
      <button className="lang-toggle" onClick={() => setLang(lang === "en" ? "id" : "en")}>
        {lang === "en" ? "ID" : "EN"}
      </button>
    </nav>
  );
}

function Hero({ t }: { t: any }) {
  return (
    <section id="home" className="hero">
      <div className="hero-bg">
        <Aurora colorStops={["#00e5ff", "#ff00ff", "#a855f7", "#00e5ff"]} speed={1.2} blur={100} />
      </div>
      <div className="hero-content">
        <p className="hero-greeting">{t.hero.greeting}</p>
        <h1><SplitText text={t.hero.name} stagger={0.03} delay={0.2} /></h1>
        <p className="hero-role">{t.hero.role}</p>
        <p className="hero-tagline">{t.hero.tagline}</p>
        <div className="hero-cta">
          <a href="#projects" className="btn-primary">{t.hero.cta} <ArrowRight size={16} /></a>
          <a href="/images/CV_AhmadZakyHumami.png" download className="btn-outline"><Download size={16} /> {t.hero.resume}</a>
        </div>
      </div>
    </section>
  );
}

function About({ t }: { t: any }) {
  return (
    <section id="about" className="section">
      <div className="container">
        <h2 className="section-title">{t.about.title}</h2>
        <div className="about">
          <div className="about-profile float">
            <img src="/images/profiles.jpg" alt="Ahmad Zaky Humami" />
          </div>
          <div className="about-info">
            <p>{t.about.bio}</p>
            <div className="about-section">
              <h3>{t.about.education}</h3>
              {t.about.eduList.map((e: any, i: number) => (
                <div key={i} className="edu-item">
                  <h4>{e.degree}</h4>
                  <p className="school">{e.school}</p>
                  <p className="period">{e.period}</p>
                </div>
              ))}
            </div>
            <div className="about-section">
              <h3>{t.about.experience}</h3>
              {t.about.expList.map((e: any, i: number) => (
                <div key={i} className="edu-item">
                  <h4>{e.role}</h4>
                  <p className="school">{e.org}</p>
                  <p className="period">{e.period}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

function Projects({ t }: { t: any }) {
  return (
    <section id="projects" className="section">
      <div className="container">
        <h2 className="section-title">{t.projects.title}</h2>
        <div className="projects-grid">
          {t.projects.items.map((p: any, i: number) => (
            <SpotlightCard key={i} className="project-card" spotlightColor="rgba(0,229,255,0.15)">
              <a href={p.link} target="_blank" rel="noreferrer" className="card-link">
                <img src={p.img.startsWith("http") ? p.img : `/images/projects/${p.img}.png`} alt={p.name} className="card-img" onError={(e) => { e.currentTarget.src = "/images/projects/landpage_pytricity.png"; }} />
                <div className="card-body">
                  <h3>{p.name}</h3>
                  <p>{p.desc}</p>
                  <div className="project-tags">{p.tags.map((tag: string, j: number) => <span key={j} className="tag">{tag}</span>)}</div>
                </div>
              </a>
            </SpotlightCard>
          ))}
        </div>
      </div>
    </section>
  );
}

function Skills({ t }: { t: any }) {
  return (
    <section id="skills" className="section">
      <div className="container">
        <h2 className="section-title">{t.skills.title}</h2>
        <div className="skills-grid">
          {t.skills.categories.map((cat: any, i: number) => (
            <div key={i} className="glass-card skill-category">
              <h3>{cat.name}</h3>
              {cat.items.map((s: any, j: number) => (
                <div key={j} className="skill-item">
                  <span className="skill-name">{s.name}</span>
                  <div className="skill-bar"><div className="skill-bar-fill" style={{ width: `${s.level}%` }} /></div>
                  <span className="skill-pct">{s.level}%</span>
                </div>
              ))}
            </div>
          ))}
        </div>
        <div className="glass-card comm-card">
          <h3>Languages</h3>
          {t.skills.communications.map((c: any, i: number) => (
            <div key={i} className="skill-item">
              <span className="skill-name">{c.name}</span>
              <div className="skill-bar"><div className="skill-bar-fill" style={{ width: `${c.level}%` }} /></div>
              <span className="skill-pct">{c.level}%</span>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function Certificates({ t }: { t: any }) {
  return (
    <section id="certificates" className="section">
      <div className="container">
        <h2 className="section-title">{t.certificates.title}</h2>
        <div className="cert-grid">
          {t.certificates.items.map((c: any, i: number) => (
            <div key={i} className="glass-card cert-card">
              <img src={`/images/${c.img}`} alt={c.name} loading="lazy" />
              <p>{c.name}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function Contact({ t }: { t: any }) {
  const links = [
    { icon: <Mail size={18} />, label: t.contact.email, href: `mailto:${t.contact.email}` },
    { icon: <Phone size={18} />, label: t.contact.phone, href: `tel:${t.contact.phone.replace(/\s/g, "")}` },
    { icon: <MapPin size={18} />, label: t.contact.address, href: "#" },
  ];
  return (
    <section id="contact" className="section">
      <div className="container">
        <h2 className="section-title">{t.contact.title}</h2>
        <p className="contact-subtitle">{t.contact.subtitle}</p>
        <div className="contact-links">
          {links.map((l, i) => (
            <a key={i} href={l.href} className="contact-link">{l.icon} {l.label}</a>
          ))}
        </div>
      </div>
    </section>
  );
}

function Footer({ t }: { t: any }) {
  const socials = [
    { icon: <GithubIcon />, href: t.contact.socials.github },
    { icon: <LinkedinIcon />, href: t.contact.socials.linkedin },
    { icon: <InstagramIcon />, href: t.contact.socials.instagram },
  ];
  return (
    <footer className="footer">
      <div className="footer-socials">
        {socials.map((s, i) => <a key={i} href={s.href} target="_blank" rel="noreferrer">{s.icon}</a>)}
      </div>
      <p>© {new Date().getFullYear()} Ahmad Zaky Humami. {t.footer}</p>
    </footer>
  );
}

export default function App() {
  const { lang, setLang, t } = useLang();
  return (
    <>
      <Navbar lang={lang} setLang={setLang} t={t} />
      <main>
        <Hero t={t} />
        <About t={t} />
        <Projects t={t} />
        <Skills t={t} />
        <Certificates t={t} />
        <Contact t={t} />
      </main>
      <Footer t={t} />
    </>
  );
}
