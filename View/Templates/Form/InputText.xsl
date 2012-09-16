<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>

  <xsl:template name="InputText">

    <xsl:param name="label"/>
    <xsl:param name="value"/>
    <xsl:param name="name"/>
    <xsl:param name="id"/>
    <xsl:param name="placeholder"/>

    <label>
      <xsl:value-of select="$label"/>
    </label>

    <input type="text">

      <xsl:attribute name="value">
        <xsl:value-of select="$value"/>
      </xsl:attribute>

      <xsl:attribute name="name">
        <xsl:value-of select="$name"/>
      </xsl:attribute>

      <xsl:attribute name="placeholder">
        <xsl:value-of select="$placeholder"/>
      </xsl:attribute>

      <xsl:attribute name="id">
        <xsl:choose>
          <xsl:when test="$id = ''">
            <xsl:text>form-</xsl:text>
            <xsl:value-of select="$name"/>
          </xsl:when>
          <xsl:otherwise>
            <xsl:value-of select="$id"/>
          </xsl:otherwise>
        </xsl:choose>
      </xsl:attribute>

    </input>

  </xsl:template>

</xsl:stylesheet>
