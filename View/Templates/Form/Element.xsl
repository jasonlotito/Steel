<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output omit-xml-declaration="yes" method="xml" version="1.0" encoding="utf-8"/>

  <xsl:attribute-set name="form-attributes">

    <xsl:attribute name="name">
      <xsl:value-of select="$name"/>
    </xsl:attribute>

    <xsl:attribute name="id">
      <xsl:value-of select="setId"/>
    </xsl:attribute>

    <xsl:attribute name="class">
      <xsl:value-of select="$class"/>
    </xsl:attribute>

  </xsl:attribute-set>

  <xsl:attribute-set name="input-attributes" use-attribute-sets="form-attributes">

    <xsl:attribute name="placeholder">
      <xsl:value-of select="$placeholder"/>
    </xsl:attribute>

    <xsl:attribute name="value">
      <xsl:value-of select="$value"/>
    </xsl:attribute>

  </xsl:attribute-set>

</xsl:stylesheet>