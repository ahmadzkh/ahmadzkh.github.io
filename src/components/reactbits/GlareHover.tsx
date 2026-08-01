"use client";

import { useEffect, useRef, ReactNode } from "react";

interface GlareHoverProps {
  children: ReactNode;
  className?: string;
  glareColor?: string;
  borderRadius?: string;
}

const GlareHover = ({
  children,
  className = "",
  glareColor = "rgba(255, 255, 255, 0.4)",
  borderRadius = "8px",
}: GlareHoverProps) => {
  const containerRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const container = containerRef.current;
    if (!container) return;

    const handleMouseMove = (e: MouseEvent) => {
      const rect = container.getBoundingClientRect();
      const x = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
      const y = ((e.clientY - rect.top) / rect.height - 0.5) * 2;

      container.style.setProperty("--x", `${x * 15}deg`);
      container.style.setProperty("--y", `${-y * 15}deg`);
      container.style.setProperty("--glare-x", `${50 + x * 30}%`);
      container.style.setProperty("--glare-y", `${50 + y * 30}%`);
    };

    const handleMouseLeave = () => {
      container.style.setProperty("--x", "0deg");
      container.style.setProperty("--y", "0deg");
    };

    container.addEventListener("mousemove", handleMouseMove);
    container.addEventListener("mouseleave", handleMouseLeave);

    return () => {
      container.removeEventListener("mousemove", handleMouseMove);
      container.removeEventListener("mouseleave", handleMouseLeave);
    };
  }, []);

  return (
    <div
      ref={containerRef}
      className={className}
      style={{
        perspective: "1000px",
        transformStyle: "preserve-3d",
      }}
    >
      <div
        style={{
          transform: "rotateX(var(--y, 0)) rotateY(var(--x, 0))",
          transition: "transform 0.1s ease-out",
          position: "relative",
          overflow: "hidden",
          borderRadius,
        }}
      >
        {children}
        <div
          style={{
            position: "absolute",
            top: 0,
            left: 0,
            width: "100%",
            height: "100%",
            background: `radial-gradient(circle at var(--glare-x, 50%) var(--glare-y, 50%), ${glareColor} 0%, transparent 60%)`,
            pointerEvents: "none",
            opacity: 0.6,
          }}
        />
      </div>
    </div>
  );
};

export default GlareHover;
